<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoomType;
use App\Models\ConferenceRoom;

new class extends Component
{
    public $roomTypes;
    public $conferenceRooms;

    public function mount()
    {
        $this->roomTypes = RoomType::orderBy('name')->get();
        $this->conferenceRooms = ConferenceRoom::orderBy('name')->get();
    }
}

?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="relative h-[50vh] min-h-[400px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort accommodation"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Stay with Us</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Accommodation</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4">Choose from our premium rooms and conference spaces
                designed for comfort and productivity.</p>
        </div>
    </section>

    <!-- Room Types Section -->
    <section class="py-24 bg-cream">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Rooms</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Rooms Designed for
                    Comfort</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-lg mx-auto">Discover our premium rooms, crafted
                    for relaxation and refined comfort after a day of adventure.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
                @forelse($roomTypes as $roomType)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1.5 transition-all duration-300 flex flex-col reveal group">
                    <div class="h-72 overflow-hidden relative">
                        <img src="{{ $roomType->image ? Storage::url($roomType->image) : 'https://via.placeholder.com/600x400' }}"
                            alt="{{ $roomType->name }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">
                        @if($roomType->featured)
                        <span
                            class="absolute top-4 right-4 bg-amber-500 text-white text-xs font-bold tracking-[0.08em] uppercase px-4 py-1.5 rounded-full shadow-sm">Featured</span>
                        @endif
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-2">{{ $roomType->name
                            }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">{{ $roomType->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($roomType->amenities as $amenity)
                            <span
                                class="inline-flex items-center gap-1.5 bg-gray-100 text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200">
                                @if($amenity->icon)
                                <i class="{{ $amenity->icon }} text-amber-400 text-[0.65rem]"></i>
                                @endif
                                {{ $amenity->name }}
                            </span>
                            @endforeach
                            @if($roomType->capacity)
                            <span
                                class="inline-flex items-center gap-1.5 bg-gray-100 text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200">
                                <i class="fas fa-user text-amber-400 text-[0.65rem]"></i> Up to {{ $roomType->capacity
                                }} guests
                            </span>
                            @endif
                        </div>
                        <div class="flex items-center justify-between mt-auto">
                            <div>
                                <span class="font-[Cormorant_Garamond] text-3xl font-semibold text-navy">KES {{
                                    number_format($roomType->price_per_night) }}</span>
                                <span class="text-gray-400 text-xs ml-1">/night</span>
                            </div>
                            <a href="{{ route('book.room', $roomType->id) }}"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fas fa-bed text-xs"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 col-span-2">No room types available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Conference Rooms Section -->
    @if($conferenceRooms->count())
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Conference</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Meet, Inspire,
                    Achieve</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-lg mx-auto">Modern facilities equipped for
                    productive meetings, workshops, training sessions, and corporate events.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($conferenceRooms as $room)
                <div
                    class="bg-cream rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row reveal group">
                    <div class="sm:w-56 shrink-0 overflow-hidden">
                        <img src="{{ $room->image ? Storage::url($room->image) : 'https://via.placeholder.com/600x400' }}"
                            alt="{{ $room->name }}"
                            class="w-full h-52 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-7 flex flex-col justify-center">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">{{ $room->name }}
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">{{ $room->description }}</p>
                        <ul class="space-y-1.5 mb-5">
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-users text-amber-400 text-xs"></i> Capacity: {{ $room->capacity }}
                                people
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-video text-amber-400 text-xs"></i> Projector & Screen
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-wifi text-amber-400 text-xs"></i> High-Speed WiFi
                            </li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold">KES {{ number_format($room->price_per_day) }} /
                                day</span>
                            <a href="{{ route('book.conference', $room->id) }}"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-xs font-semibold px-5 py-2 rounded-full transition-all duration-300">
                                Enquire
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Call to action -->
    <section class="py-16 bg-navy text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="font-[Cormorant_Garamond] text-3xl md:text-4xl text-white mb-4">Ready to book your stay?</h2>
            <p class="text-white/70 text-lg mb-8">Experience the comfort of Chumba Resort today.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('book.room') }}"
                    class="bg-amber-500 hover:bg-amber-400 text-white px-8 py-3.5 rounded-full font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fas fa-bed mr-2"></i> Book a Room
                </a>
                <a href="{{ route('book.conference') }}"
                    class="bg-transparent border border-white/50 hover:border-white hover:bg-white/10 text-white px-8 py-3.5 rounded-full font-semibold text-sm transition-all duration-300">
                    <i class="fas fa-calendar-alt mr-2"></i> Reserve Conference
                </a>
            </div>
        </div>
    </section>
</div>
