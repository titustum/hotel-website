<?php

// resources\views\pages\⚡book-conference.blade.php

use Livewire\Component;
use App\Models\ConferenceRoom;
use App\Models\ConferenceBooking;
use Carbon\Carbon;


new class extends Component
{
    // Search criteria
    public $conference_room_id = '';
    public $event_date = '';
    public $attendees = 1;

    // Client details
    public $client_name = '';
    public $client_phone = '';
    public $client_email = '';
    public $notes = '';

    // Results
    public $conferenceRooms = [];
    public $selectedRoom = null;
    public $isAvailable = false;
    public $availabilityMessage = '';

    protected function rules()
    {
        return [
            'conference_room_id' => 'required|exists:conference_rooms,id',
            'event_date'         => 'required|date|after_or_equal:today',
            'attendees'          => 'nullable|integer|min:1',
            'client_name'        => 'required|string|min:3',
            'client_phone'       => 'required|string|min:10',
            'client_email'       => 'nullable|email',
            'notes'              => 'nullable|string|max:500',
        ];
    }

    public function mount()
    {
        $this->conferenceRooms = ConferenceRoom::all();
        $this->event_date = Carbon::today()->format('Y-m-d');
    }

    /**
     * Check if the selected conference room is available on the chosen date.
     */
    public function checkAvailability()
    {
        $this->validate([
            'conference_room_id' => 'required|exists:conference_rooms,id',
            'event_date'         => 'required|date|after_or_equal:today',
            'attendees'          => 'nullable|integer|min:1',
        ]);

        $room = ConferenceRoom::find($this->conference_room_id);

        // Optional: check if attendees exceed capacity
        if ($this->attendees && $this->attendees > $room->capacity) {
            $this->addError('attendees', "This room can only accommodate up to {$room->capacity} attendees.");
            return;
        }

        // Check for existing bookings on that date (excluding cancelled)
        $existing = ConferenceBooking::where('conference_room_id', $this->conference_room_id)
            ->where('event_date', $this->event_date)
            ->where('status', '!=', 'cancelled')
            ->exists();

        $this->isAvailable = !$existing;
        $this->availabilityMessage = $this->isAvailable
            ? 'The room is available on this date.'
            : 'Sorry, this room is already booked for the selected date.';

        if ($this->isAvailable) {
            $this->selectedRoom = $room;
        } else {
            $this->selectedRoom = null;
        }
    }

    /**
     * Submit the booking.
     */
    public function book()
    {
        $this->validate();

        if (!$this->selectedRoom) {
            session()->flash('error', 'Please check availability first.');
            return;
        }

        // Double-check availability again (avoid race condition)
        $stillAvailable = !ConferenceBooking::where('conference_room_id', $this->conference_room_id)
            ->where('event_date', $this->event_date)
            ->where('status', '!=', 'cancelled')
            ->exists();

        if (!$stillAvailable) {
            session()->flash('error', 'Sorry, the room was just booked. Please choose another date or room.');
            $this->selectedRoom = null;
            $this->isAvailable = false;
            return;
        }

        // Create booking
        ConferenceBooking::create([
            'conference_room_id' => $this->conference_room_id,
            'client_name'        => $this->client_name,
            'client_phone'       => $this->client_phone,
            'client_email'       => $this->client_email,
            'event_date'         => $this->event_date,
            'attendees'          => $this->attendees,
            'status'             => 'pending', // or 'confirmed' if you want auto-confirm
            'notes'              => $this->notes,
        ]);

        session()->flash('success', 'Your conference booking request has been submitted. We will contact you shortly.');

        // Reset form
        $this->reset(['conference_room_id', 'attendees', 'client_name', 'client_phone', 'client_email', 'notes', 'selectedRoom', 'isAvailable']);
        $this->event_date = Carbon::today()->format('Y-m-d');
    }
};
?>



<div class="bg-white">
    <!-- Hero Section (smaller than homepage) -->
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

    <div class="max-w-4xl mx-auto py-12 px-6">
        <div class="text-center mb-10 mt-12">
            <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Conference
                Booking</span>
            <h1 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy">Reserve a Meeting Space</h1>
            <p class="text-gray-500 mt-4 max-w-lg mx-auto">Book our modern conference rooms for your next event,
                training,
                or meeting.</p>
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
        <div class="bg-white shadow-sm rounded-2xl p-8 mb-8">
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Conference Room</label>
                    <select wire:model="conference_room_id"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                        <option value="">Select a room</option>
                        @foreach($conferenceRooms as $room)
                        <option value="{{ $room->id }}">
                            {{ $room->name }} – KES {{ number_format($room->price_per_day) }}/day (max {{
                            $room->capacity }}
                            pax)
                        </option>
                        @endforeach
                    </select>
                    @error('conference_room_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Event Date</label>
                    <input type="date" wire:model="event_date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('event_date') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Expected Attendees</label>
                    <input type="number" wire:model="attendees" min="1" placeholder="e.g., 20"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('attendees') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <button wire:click="checkAvailability" wire:loading.attr="disabled">
                <span wire:loading.remove><i class="fas fa-search mr-2"></i> Check Availability</span>
                <span wire:loading>Checking...</span>
            </button>


            @if($availabilityMessage)
            <div
                class="mt-4 p-3 rounded-lg {{ $isAvailable ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                <i class="fas {{ $isAvailable ? 'fa-check-circle' : 'fa-exclamation-circle' }} mr-2"></i>
                {{ $availabilityMessage }}
            </div>
            @endif

            @if($isAvailable && $selectedRoom)
            <div class="mt-4 p-4 bg-amber-50 rounded-lg">
                <p class="font-semibold text-navy">Total for this booking:</p>
                <p class="text-2xl font-bold text-amber-600">KES {{ number_format($selectedRoom->price_per_day) }}</p>
                <p class="text-xs text-gray-500">Price includes full‑day hire of the room.</p>
            </div>
            @endif
        </div>

        <!-- Step 2: Client Details (only shown if room is available) -->
        @if($isAvailable && $selectedRoom)
        <div class="bg-white rounded-2xl shadow-sm p-8 border-t-4 border-amber-400">
            <h2 class="text-2xl font-bold mb-6 text-navy">Enter Your Details</h2>
            <p class="mb-4 text-gray-600">You are booking <span class="font-semibold">{{ $selectedRoom->name }}</span>
                for
                <span class="font-semibold">{{ \Carbon\Carbon::parse($event_date)->format('l, F j, Y') }}</span>.
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Full Name *</label>
                    <input type="text" wire:model="client_name" placeholder="John Doe"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('client_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Phone Number *</label>
                    <input type="text" wire:model="client_phone" placeholder="+254 700 000 000"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('client_phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Email (optional)</label>
                    <input type="email" wire:model="client_email" placeholder="you@example.com"
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                    @error('client_email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Additional Notes</label>
                    <textarea wire:model="notes" rows="3" placeholder="Any special requirements..."
                        class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"></textarea>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button wire:click="book"
                    class="bg-amber-500 hover:bg-amber-400 text-white px-10 py-3 rounded-full font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fas fa-check-circle mr-2"></i> Confirm Booking
                </button>
            </div>
        </div>
        @endif
    </div>


</div>
