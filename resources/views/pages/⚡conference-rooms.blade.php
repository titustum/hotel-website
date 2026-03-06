<?php

use Livewire\Component;
use App\Models\ConferenceRoom;

new class extends Component {
    public $conferenceRooms;

    public function mount()
    {
        $this->conferenceRooms = ConferenceRoom::orderBy('price')->get();
    }
};

?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="relative h-[50vh] min-h-100 flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/conference-image.jpg') }}" alt="Conference rooms"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Meetings & Events</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Conference Rooms</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4">Modern, fully‑equipped spaces for productive
                meetings, workshops, and corporate events.</p>
        </div>
    </section>

    <!-- Conference Rooms Grid -->
    <section class="py-24 bg-cream">
        <div class="max-w-6xl mx-auto px-6">
            @if($conferenceRooms->isEmpty())
            <p class="text-center text-gray-500">No conference rooms available at the moment.</p>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($conferenceRooms as $room)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col md:flex-row reveal group">
                    <div class="md:w-56 shrink-0 overflow-hidden">
                        <img src="{{ $room->image ? Storage::url($room->image) : 'https://via.placeholder.com/600x400' }}"
                            alt="{{ $room->name }}"
                            class="w-full h-56 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-7 flex flex-col justify-center flex-1">
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
                                <i class="fas fa-wifi text-amber-400 text-xs"></i> High‑Speed WiFi
                            </li>
                        </ul>
                        <div class="flex items-center justify-between mt-auto">
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
            @endif
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-16 bg-navy text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="font-[Cormorant_Garamond] text-3xl md:text-4xl text-white mb-4">Plan Your Next Event</h2>
            <p class="text-white/70 text-lg mb-8">Contact us to check availability and reserve your preferred conference
                room.</p>
            <a href="{{ route('book.conference') }}"
                class="bg-amber-500 hover:bg-amber-400 text-white px-8 py-3.5 rounded-full font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5">
                <i class="fas fa-calendar-alt mr-2"></i> Book a Conference Room
            </a>
        </div>
    </section>
</div>
