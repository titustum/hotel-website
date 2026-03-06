<?php

use Livewire\Component;
use App\Models\ContactMessage;

new class extends Component
{
    public $roomTypes;
    public $conference_rooms;
    public $testimonials;
    public $galleries;
    public $menuItems; // featured menu items

    // Contact form fields
    public $name;
    public $phone;
    public $email;
    public $service_interest;
    public $message;

    public function mount()
    {
        $this->roomTypes = App\Models\RoomType::limit(2)->get(); // show only 2 on homepage
        $this->conference_rooms = App\Models\ConferenceRoom::limit(2)->get(); // show only 2
        $this->testimonials = App\Models\Testimonial::where('featured', true)->orWhereNotNull('id')->limit(3)->get();
        $this->galleries = App\Models\Gallery::limit(4)->get(); // show 6 images
        $this->menuItems = App\Models\MenuItem::where('available', true)
            ->orderBy('is_signature', 'desc')
            ->orderBy('is_popular', 'desc')
            ->limit(4)
            ->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'service_interest' => 'required',
            'message' => 'required|min:5',
        ]);

        ContactMessage::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'service_interest' => $this->service_interest,
            'message' => $this->message,
            'status' => 'new',
        ]);

        $this->reset(['name','phone','email','service_interest','message']);

        session()->flash('success','Message sent successfully. We will contact you soon.');
    }
};
?>

<main>
    <!-- ===== HERO ===== (unchanged, but CTA links updated) -->
    <section id="home"
        class="relative h-screen min-h-150 flex flex-col items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center scale-105 transition-transform duration-6000 ease-out"
            id="heroBg" style="background-image: url('{{ asset('images/oplique-resort-image.jpeg') }}');"></div>
        <div class="absolute inset-0 z-1 bg-linear-to-b from-[#0f1932]/60 via-[#0f1932]/70 to-[#0f1932]/85"></div>

        <div class="relative z-10 px-5 max-w-4xl mx-auto">
            <div
                class="inline-flex items-center gap-2 bg-amber-500/20 border border-amber-400/50 text-amber-300 text-xs font-bold tracking-[0.15em] uppercase px-4 py-1.5 rounded-full mb-6 animate-[fadeInDown_0.8s_ease_forwards]">
                <i class="fas fa-star text-[0.6rem]"></i> Premier Resort — Biretwo, Kenya
            </div>
            <h1
                class="font-[Cormorant_Garamond] text-5xl sm:text-6xl md:text-7xl font-light text-white leading-[1.1] tracking-tight mb-5 animate-[fadeInUp_0.9s_ease_0.2s_both]">
                Welcome to<br><em class="italic text-amber-300">Chumba Resort</em>
            </h1>
            <p
                class="hidden md:block text-lg sm:text-xl text-white/80 font-light leading-relaxed max-w-xl mx-auto mb-10 animate-[fadeInUp_0.9s_ease_0.4s_both]">
                Relax, dine, and unwind at our premium resort nestled in Elgeyo Marakwet County. Where Kenyan
                hospitality meets refined comfort.
            </p>
            <div class="flex flex-wrap gap-4 justify-center mb-12 animate-[fadeInUp_0.9s_ease_0.6s_both]">
                <a href="{{ route('book.room') }}"
                    class="inline-flex items-center gap-2.5 bg-amber-500 hover:bg-amber-400 text-white px-8 py-3.5 rounded-full text-base font-semibold tracking-wide transition-all duration-300 hover:-translate-y-0.5 shadow-[0_4px_20px_rgba(201,147,58,0.45)] hover:shadow-[0_8px_30px_rgba(201,147,58,0.55)]">
                    <i class="fas fa-bed"></i> Book a Room
                </a>
                <a href="https://maps.app.goo.gl/LSV9VGx7YfKtf28x6" target="_blank"
                    class="inline-flex items-center gap-2.5 bg-transparent border border-white/50 hover:border-white hover:bg-white/10 text-white px-7 py-3.5 rounded-full text-base font-medium transition-all duration-300">
                    <i class="fas fa-map-marker-alt"></i> Get Directions
                </a>
            </div>
            <div class="flex flex-wrap gap-8 justify-center animate-[fadeInUp_0.9s_ease_0.8s_both]">
                <a href="{{ route('restaurant') }}"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300">
                    <i class="fas fa-utensils"></i> Bar & Dining
                </a>
                <a href="{{ route('conference') }}"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300">
                    <i class="fas fa-users"></i> Conference
                </a>
                <a href="tel:+0723874428"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300">
                    <i class="fas fa-phone-alt"></i> +0723 874 428
                </a>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <div class="w-7 h-11 border-2 border-white/40 rounded-[14px] flex items-start justify-center pt-1.5">
                <div class="w-1 h-2 bg-white rounded-full animate-[scrollDot_1.5s_infinite]"></div>
            </div>
        </div>
    </section>

    <!-- ===== STATS ===== (dynamic counts) -->
    <div class="bg-navy py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-white/10">
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">24/7
                    </div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Always Open</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">{{
                        App\Models\RoomType::count() }}</div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Room Types</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">{{
                        App\Models\MenuItem::where('available', true)->count() }}+</div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Menu Offerings</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">{{
                        App\Models\ConferenceRoom::count() }}</div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Conference Rooms</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== BAR & RESTAURANT ===== (dynamic featured items) -->
    <section id="restaurant" class="bg-cream py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Dining &
                    Bar</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Flavours of Kenya
                </h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">
                    Experience authentic Kenyan cuisine and a wide selection of drinks — from traditional dishes to
                    refreshing cocktails and fine wines.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">
                @foreach($menuItems as $item)
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ $item->image ? Storage::url($item->image) : 'https://via.placeholder.com/400x300' }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-contain py-2 md:py-3 group-hover:scale-105 transition-transform duration-500">
                        @if($item->is_signature)
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Signature</span>
                        @elseif($item->is_popular)
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Popular</span>
                        @elseif($item->is_premium)
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Premium</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">{{ $item->name }}
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">{{ \Str::limit($item->description, 80) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold text-base">KES {{ number_format($item->price)
                                }}</span>
                            <a href="tel:+0723874428"
                                class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link">
                                Order <i
                                    class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-14 reveal">
                <a href="{{ route('restaurant') }}"
                    class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fas fa-utensils"></i> View Full Menu
                </a>
            </div>
        </div>
    </section>

    <!-- ===== ACCOMMODATION ===== (dynamic room types) -->
    <section id="accommodation" class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-14 flex items-end justify-between reveal">
                <div>
                    <span
                        class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Accommodation</span>
                    <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Rooms Designed
                        for Comfort</h2>
                    <p class="text-gray-500 text-base leading-relaxed max-w-lg">Discover our premium rooms, crafted for
                        relaxation and refined comfort after a day of adventure.</p>
                </div>
                <a href="{{ route('accommodation') }}"
                    class="text-amber-500 hover:text-amber-600 text-sm font-semibold uppercase tracking-wide flex items-center gap-1 transition-colors">
                    View all <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
                @foreach($roomTypes as $roomType)
                <div
                    class="bg-cream rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1.5 transition-all duration-300 flex flex-col reveal group">
                    <div class="h-72 overflow-hidden relative">
                        <img src="{{ $roomType->image ? Storage::url($roomType->image) : 'https://via.placeholder.com/600x400' }}"
                            alt="{{ $roomType->name }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">
                        @if($roomType->featured)
                        <span
                            class="absolute top-4 right-4 bg-white text-navy text-xs font-bold tracking-[0.08em] uppercase px-4 py-1.5 rounded-full shadow-sm">Featured</span>
                        @endif
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-2">{{ $roomType->name
                            }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">{{ $roomType->description }}</p>
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
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== AMENITIES ===== (unchanged) -->
    <section id="amenities" class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Resort
                    Facilities</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Amenities & Comfort
                </h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">
                    Enjoy modern comforts and thoughtful facilities designed to make your stay relaxing, convenient, and
                    memorable.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-wifi"></i></div>
                    <p class="text-sm text-gray-600">Free WiFi</p>
                </div>
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-car"></i></div>
                    <p class="text-sm text-gray-600">Secure Parking</p>
                </div>
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-utensils"></i></div>
                    <p class="text-sm text-gray-600">Restaurant & Bar</p>
                </div>
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-briefcase"></i></div>
                    <p class="text-sm text-gray-600">Conference Rooms</p>
                </div>
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-concierge-bell"></i></div>
                    <p class="text-sm text-gray-600">Room Service</p>
                </div>
                <div class="reveal">
                    <div class="text-3xl text-amber-500 mb-3"><i class="fas fa-tree"></i></div>
                    <p class="text-sm text-gray-600">Relaxing Gardens</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CONFERENCE ===== (dynamic conference rooms) -->
    <section id="conference" class="bg-warm py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Conference &
                    Events</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Meet, Inspire,
                    Achieve</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-lg mx-auto">Modern facilities equipped for
                    productive meetings, workshops, training sessions, and corporate events.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($conference_rooms as $room)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row reveal group">
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
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Capacity: {{ $room->capacity }}
                                people</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Projector & Screen</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> High-Speed WiFi</li>
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

    <!-- ===== GALLERY ===== (dynamic) -->
    <section id="gallery" class="bg-cream py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Photo
                    Gallery</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Moments at Chumba
                    Resort</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">
                    Take a glimpse into the relaxing atmosphere, delicious cuisine, and beautiful spaces that make every
                    stay memorable.
                </p>
            </div>

            <div class="max-w-7xl mx-auto px-6">
                @if($galleries->isEmpty())
                <p class="text-center text-gray-500">No images in the gallery yet.</p>
                @else
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($galleries as $gallery)
                    <div wire:key="{{ $gallery->id }}"
                        class="relative overflow-hidden rounded-xl shadow-sm hover:shadow-xl cursor-pointer group reveal">
                        <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery image' }}"
                            class="w-full h-64 md:h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                        @if($gallery->title || $gallery->category)
                        <div
                            class="absolute inset-0 bg-linear-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <div>
                                @if($gallery->category)
                                <span class="text-amber-300 text-xs font-semibold uppercase tracking-wider">{{
                                    $gallery->category }}</span>
                                @endif
                                @if($gallery->title)
                                <h3 class="text-white text-lg font-[Cormorant_Garamond]">{{ $gallery->title }}</h3>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="text-center mt-14 reveal">
                <a href="{{ route('gallery') }}"
                    class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fas fa-images"></i> View All Gallery
                </a>
            </div>


        </div>
    </section>

    <!-- ===== ABOUT ===== (link to about page) -->
    <section id="about" class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative reveal">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort"
                            class="w-full h-115 object-cover">
                    </div>
                    <div
                        class="hidden md:block absolute -bottom-8 -right-8 w-44 h-52 rounded-xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="{{ asset('images/nyama-choma.webp') }}" alt="Food" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="reveal lg:pl-4">
                    <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Our
                        Story</span>
                    <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-5">A Destination
                        Unlike Any Other</h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-6">Chumba Resort, located in Biretwo, Elgeyo
                        Marakwet County, offers a premier destination for relaxation, luxurious accommodations, fine
                        dining, and a vibrant bar — designed to provide you with the utmost comfort and unforgettable
                        experiences.</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100"><i
                                class="fas fa-map-marker-alt text-amber-400 mt-0.5 w-4"></i> Nestled in the scenic
                            Elgeyo Marakwet highlands of Kenya</li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100"><i
                                class="fas fa-clock text-amber-400 mt-0.5 w-4"></i> Open 24 hours a day, 7 days a week
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100"><i
                                class="fas fa-utensils text-amber-400 mt-0.5 w-4"></i> Authentic Kenyan cuisine and
                            international beverages</li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100"><i
                                class="fas fa-users text-amber-400 mt-0.5 w-4"></i> Modern conference facilities for all
                            group sizes</li>
                    </ul>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                        <i class="fas fa-info-circle"></i> Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== (dynamic) -->
    <section id="testimonials" class="bg-cream py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Guest
                    Experiences</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">What Our Guests Say
                </h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">
                    Discover why guests love staying at Chumba Resort — from warm hospitality to unforgettable dining
                    and relaxing accommodations.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 reveal">
                    <div class="text-amber-400 text-lg mb-4">
                        @for($i=0; $i<5; $i++) <i class="fas fa-star{{ $i < $testimonial->rating ? '' : '-o' }}"></i>
                            @endfor
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">“{{ $testimonial->message }}”</p>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-11 h-11 rounded-full bg-navy text-white flex items-center justify-center font-semibold">
                            {{ substr($testimonial->name, 0, 2) }}
                        </div>
                        <div>
                            <div class="text-navy font-semibold text-sm">{{ $testimonial->name }}</div>
                            <div class="text-gray-400 text-xs">{{ $testimonial->role ?? 'Guest' }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== CONTACT ===== (unchanged, but form is already livewire) -->
    <section id="contact" class="bg-navy py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-14 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-400 mb-3 block">Get in
                    Touch</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-white mb-4">Contact &
                    Reservations</h2>
                <p class="text-white/60 text-base leading-relaxed max-w-lg">Ready to book or have a question? Reach out
                    and our team will respond promptly.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.4fr] gap-14 items-start">
                <!-- Info -->
                <div class="reveal">
                    <ul class="divide-y divide-white/10">
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-300 text-sm shrink-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Phone</div><a
                                    href="tel:+0723874428"
                                    class="text-white hover:text-amber-300 transition-colors text-sm">+0723 874 428</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-300 text-sm shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Email</div><a
                                    href="mailto:info@chumbaresort.com"
                                    class="text-white hover:text-amber-300 transition-colors text-sm">info@chumbaresort.com</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-300 text-sm shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Location</div>
                                <span class="text-white text-sm">Stabex Biretwo, Elgeyo Marakwet County, Kenya</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-300 text-sm shrink-0">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Hours</div><span
                                    class="text-white text-sm">Open 24 Hours, Every Day</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Form -->
                <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl reveal">
                    <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-7">Send a Message</h3>
                    @if(session()->has('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
                    @endif

                    <form wire:submit.prevent="sendMessage">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Full
                                    Name</label>
                                <input type="text" wire:model="name" placeholder="Your name"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm bg-gray-50">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Phone</label>
                                <input type="tel" wire:model="phone" placeholder="+254 700 000 000"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm bg-gray-50">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Email
                                Address</label>
                            <input type="email" wire:model="email" placeholder="your@email.com"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm bg-gray-50">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Interested
                                In</label>
                            <select wire:model="service_interest"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm bg-gray-50">
                                <option value="">— Select a service —</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="Restaurant">Bar & Restaurant</option>
                                <option value="Conference">Conference Room</option>
                                <option value="General">General Enquiry</option>
                            </select>
                            @error('service_interest') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Your Message</label>
                            <textarea rows="4" wire:model="message" placeholder="Tell us how we can help…"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm bg-gray-50 resize-none"></textarea>
                            @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit"
                            class="w-full py-3.5 bg-navy hover:bg-amber-500 text-white font-semibold text-sm rounded-full flex items-center justify-center gap-2.5 transition-all">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MAP ===== -->
    <div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.820231519588!2d35.55000836001407!3d0.5410015830328788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x17811f00200d5485%3A0x921de6ead9e75f29!2sCHUMBA%20RESORT%20BAR%20AND%20RESTAURANT!5e0!3m2!1ssw!2ske!4v1741434619698!5m2!1ssw!2ske"
            class="w-full h-96 block" style="filter:grayscale(15%)" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</main>

<script>
    // Hero Ken Burns (already handled in app layout, but kept for safety)
    document.addEventListener('livewire:init', function () {
        const heroBg = document.getElementById('heroBg');
        if (heroBg) heroBg.style.transform = 'scale(1)';
    });
</script>
