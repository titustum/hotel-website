<?php

// resources\views\pages\⚡book-room.blade.php

use Livewire\Component;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\RoomBooking;
use Carbon\Carbon;

new class extends Component
{
    // Search criteria
    public $room_type_id = '';
    public $check_in = '';
    public $check_out = '';
    public $guests = 1;

    // Guest details
    public $guest_name = '';
    public $guest_email = '';
    public $guest_phone = '';
    public $special_requests = '';

    // Results
    public $availableRooms = [];
    public $roomTypes = [];
    public $selectedRoom = null;      // temporarily hold room being booked
    public $totalPrice = 0;

    // UI state
    public $checkingAvailability = false;
    public $processingBooking = false;

    protected function rules()
    {
        return [
            'room_type_id' => 'required|exists:room_types,id',
            'check_in'     => 'required|date|after_or_equal:today',
            'check_out'    => 'required|date|after:check_in',
            'guests'       => 'required|integer|min:1',
            'guest_name'   => 'required|string|min:3',
            'guest_email'  => 'required|email',
            'guest_phone'  => 'required|string|min:10',
            'special_requests' => 'nullable|string|max:500',
        ];
    }

    public function mount()
    {
        $this->roomTypes = RoomType::all();
        $this->check_in = Carbon::today()->format('Y-m-d');
        $this->check_out = Carbon::tomorrow()->format('Y-m-d');
    }

    /**
     * Step 1: Check availability based on dates & room type
     */
    public function checkAvailability()
    {
        $this->checkingAvailability = true;

        $this->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'check_in'     => 'required|date|after_or_equal:today',
            'check_out'    => 'required|date|after:check_in',
            'guests'       => 'required|integer|min:1',
        ]);

        $roomType = RoomType::find($this->room_type_id);

        if ($this->guests > $roomType->capacity) {
            $this->addError('guests', "This room type can only accommodate {$roomType->capacity} guest(s).");
            $this->checkingAvailability = false;
            return;
        }

        $this->findAvailableRooms();
        $this->calculateTotalPrice($roomType);

        $this->checkingAvailability = false;
    }

    /**
     * Step 2: Select a specific room to book
     */
    public function selectRoom($roomId)
    {
        $this->selectedRoom = Room::with('roomType')->find($roomId);
        $this->dispatch('scrollToBookingForm'); // Alpine will listen
    }

    /**
     * Step 3: Confirm booking for the selected room
     */
    public function book()
    {
        $this->processingBooking = true;

        $this->validate();

        if (!$this->selectedRoom) {
            session()->flash('error', 'Please select a room first.');
            $this->processingBooking = false;
            return;
        }

        $stillAvailable = $this->isRoomStillAvailable($this->selectedRoom->id);
        if (!$stillAvailable) {
            session()->flash('error', 'Sorry, that room is no longer available. Please choose another.');
            $this->selectedRoom = null;
            $this->findAvailableRooms();
            $this->processingBooking = false;
            return;
        }

        try {
            RoomBooking::create([
                'room_id'      => $this->selectedRoom->id,
                'guest_name'   => $this->guest_name,
                'guest_email'  => $this->guest_email,
                'guest_phone'  => $this->guest_phone,
                'check_in'     => $this->check_in,
                'check_out'    => $this->check_out,
                'total_price'  => $this->totalPrice,
                'status'       => 'pending',
                'notes'        => "Guests: {$this->guests}. " . $this->special_requests,
            ]);

            session()->flash('success', 'Booking request submitted successfully! We will confirm shortly.');

            $this->reset(['room_type_id', 'guests', 'guest_name', 'guest_email', 'guest_phone', 'special_requests', 'selectedRoom', 'availableRooms']);
            $this->resetValidation();
            $this->check_in = Carbon::today()->format('Y-m-d');
            $this->check_out = Carbon::tomorrow()->format('Y-m-d');
            $this->totalPrice = 0;
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong. Please try again.');
        }

        $this->processingBooking = false;
    }

    protected function findAvailableRooms()
    {
        $overlappingBookingRoomIds = RoomBooking::where('status', '!=', 'cancelled')
            ->where(function ($query) {
                $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                      ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                      ->orWhere(function ($q) {
                          $q->where('check_in', '<=', $this->check_in)
                            ->where('check_out', '>=', $this->check_out);
                      });
            })
            ->pluck('room_id');

        $this->availableRooms = Room::where('room_type_id', $this->room_type_id)
            ->where('status', 'available')
            ->whereNotIn('id', $overlappingBookingRoomIds)
            ->get();
    }

    protected function isRoomStillAvailable($roomId)
    {
        $overlapping = RoomBooking::where('room_id', $roomId)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) {
                $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                      ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                      ->orWhere(function ($q) {
                          $q->where('check_in', '<=', $this->check_in)
                            ->where('check_out', '>=', $this->check_out);
                      });
            })
            ->exists();

        return !$overlapping;
    }

    protected function calculateTotalPrice(RoomType $roomType)
    {
        $nights = Carbon::parse($this->check_in)->diffInDays(Carbon::parse($this->check_out));
        $this->totalPrice = $nights * $roomType->price_per_night;
    }
};
?>

<div class="bg-white" x-data="{ showForm: @entangle('selectedRoom') }">
    <!-- Hero Section -->
    <section class="relative h-[30vh] min-h-[400px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort landscape"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Book Us Now</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Chumba Resort</h1>
        </div>
    </section>

    <div class="max-w-7xl mx-auto py-12 px-6">

        <div class="text-center mb-10">
            <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Book Your Stay</span>
            <h1 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy">Reserve a Room at Chumba
                Resort</h1>
            <p class="text-gray-500 mt-4 max-w-lg mx-auto">Choose your dates and room type, then complete your details.
            </p>
        </div>

        @if (session()->has('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <!-- Step 1: Search Form -->
        <div class="bg-white shadow-sm rounded-2xl p-8 mb-10">
            <div class="grid md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Room Type</label>
                    <select wire:model="room_type_id"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                        <option value="">Select Room</option>
                        @foreach($roomTypes as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }} – KES {{ number_format($type->price_per_night) }}/night
                        </option>
                        @endforeach
                    </select>
                    @error('room_type_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Check In</label>
                    <input type="date" wire:model="check_in" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('check_in') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Check Out</label>
                    <input type="date" wire:model="check_out"
                        min="{{ \Carbon\Carbon::parse($this->check_in)->addDay()->format('Y-m-d') }}"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('check_out') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Guests</label>
                    <input type="number" wire:model="guests" min="1" max="10"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('guests') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <button wire:click="checkAvailability" wire:loading.attr="disabled" wire:target="checkAvailability"
                class="mt-6 bg-navy hover:bg-amber-500 text-white px-8 py-3 rounded-full font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="checkAvailability"><i class="fas fa-search mr-2"></i> Check
                    Availability</span>
                <span wire:loading wire:target="checkAvailability"><i class="fas fa-spinner fa-spin mr-2"></i>
                    Checking...</span>
            </button>

            @if($totalPrice > 0 && count($availableRooms) > 0)
            <div class="mt-4 p-3 bg-amber-50 text-amber-700 rounded-lg">
                <span class="font-semibold">Total for your stay:</span> KES {{ number_format($totalPrice) }}
            </div>
            @endif
        </div>

        <!-- Step 2: Available Rooms -->
        @if(count($availableRooms))
        <h2 class="text-2xl font-bold mb-6 text-navy">Available Rooms</h2>
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            @foreach($availableRooms as $room)
            <div
                class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100">
                <div class="h-48 bg-cover bg-center"
                    style="background-image: url('{{ $room->roomType->image ? Storage::url($room->roomType->image) : 'https://via.placeholder.com/400x300' }}');">
                </div>
                <div class="p-6">
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy">Room {{ $room->room_number }}
                    </h3>
                    <p class="text-gray-500 text-sm mb-2">{{ $room->roomType->name }}</p>
                    <p class="text-gray-400 text-xs mb-4">Floor {{ $room->floor ?? 'N/A' }}</p>
                    <button wire:click="selectRoom({{ $room->id }})"
                        class="w-full bg-navy hover:bg-amber-500 text-white text-sm font-semibold py-2.5 rounded-full transition-all duration-300">
                        Select This Room
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Step 3: Guest Details (shown only when a room is selected) -->
        <div x-show="showForm" x-cloak x-ref="bookingForm"
            x-init="$watch('showForm', value => value && $nextTick(() => $refs.bookingForm.scrollIntoView({ behavior: 'smooth', block: 'center' })))">
            @if($selectedRoom)
            <div class="bg-white rounded-2xl shadow-sm p-8 mt-8 border-t-4 border-amber-400">
                <h2 class="text-2xl font-bold mb-6 text-navy">Complete Your Booking</h2>
                <p class="mb-4 text-gray-600">You are booking <span class="font-semibold">{{
                        $selectedRoom->roomType->name }}
                        (Room {{ $selectedRoom->room_number }})</span> for <span class="font-semibold">{{
                        \Carbon\Carbon::parse($check_in)->format('M d, Y') }} – {{
                        \Carbon\Carbon::parse($check_out)->format('M d, Y') }}</span></p>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Full Name *</label>
                        <input type="text" wire:model="guest_name" placeholder="John Doe"
                            class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                        @error('guest_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Email *</label>
                        <input type="email" wire:model="guest_email" placeholder="you@example.com"
                            class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                        @error('guest_email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Phone Number *</label>
                        <input type="text" wire:model="guest_phone" placeholder="+254 700 000 000"
                            class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                        @error('guest_phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Special Requests</label>
                        <textarea wire:model="special_requests" rows="3" placeholder="Any special requirements..."
                            class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <div class="text-lg">
                        <span class="text-gray-500">Total:</span>
                        <span class="font-bold text-navy ml-2">KES {{ number_format($totalPrice) }}</span>
                    </div>
                    <button wire:click="book" wire:loading.attr="disabled" wire:target="book"
                        class="bg-amber-500 hover:bg-amber-400 text-white px-8 py-3 rounded-full font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="book"><i class="fas fa-check-circle mr-2"></i> Confirm
                            Booking</span>
                        <span wire:loading wire:target="book"><i class="fas fa-spinner fa-spin mr-2"></i>
                            Processing...</span>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
