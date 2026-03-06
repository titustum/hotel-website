<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="bg-white">
    <!-- Hero Section (smaller than homepage) -->
    <section class="relative h-[50vh] min-h-[400px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort landscape"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Welcome to</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Chumba Resort</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4">Where Kenyan hospitality meets refined comfort in
                the heart of Elgeyo Marakwet.</p>
        </div>
    </section>

    <!-- Main About Content -->
    <section class="py-24 bg-cream">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Image side -->
                <div class="relative reveal">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort"
                            class="w-full h-[500px] object-cover">
                    </div>
                    <!-- Accent card -->
                    <div
                        class="hidden md:block absolute -bottom-8 -right-8 w-44 h-52 rounded-xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="{{ asset('images/nyama-choma.webp') }}" alt="Food" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Content side -->
                <div class="reveal lg:pl-4">
                    <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Our
                        Story</span>
                    <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-5">A Destination
                        Unlike Any Other</h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-6">
                        Chumba Resort, located in Biretwo, Elgeyo Marakwet County, offers a premier destination for
                        relaxation, luxurious accommodations, fine dining, and a vibrant bar — designed to provide you
                        with the utmost comfort and unforgettable experiences.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100">
                            <i class="fas fa-map-marker-alt text-amber-400 mt-0.5 w-4"></i> Nestled in the scenic Elgeyo
                            Marakwet highlands of Kenya
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100">
                            <i class="fas fa-clock text-amber-400 mt-0.5 w-4"></i> Open 24 hours a day, 7 days a week
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100">
                            <i class="fas fa-utensils text-amber-400 mt-0.5 w-4"></i> Authentic Kenyan cuisine and
                            international beverages
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500 pb-4 border-b border-gray-100">
                            <i class="fas fa-users text-amber-400 mt-0.5 w-4"></i> Modern conference facilities for all
                            group sizes
                        </li>
                    </ul>
                    <a href="tel:+0723874428"
                        class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                        <i class="fas fa-phone-alt"></i> Speak to Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Values / Highlights -->
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Why Choose Us</span>
            <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-12">The Chumba Experience
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 reveal">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tree text-2xl text-amber-600"></i>
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Natural Beauty</h3>
                    <p class="text-gray-500 text-sm">Surrounded by the breathtaking highlands of Elgeyo Marakwet,
                        offering serene views and fresh air.</p>
                </div>
                <div class="p-6 reveal">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-utensils text-2xl text-amber-600"></i>
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Authentic Cuisine</h3>
                    <p class="text-gray-500 text-sm">From nyama choma to fine wines, our menu celebrates Kenyan flavours
                        with international flair.</p>
                </div>
                <div class="p-6 reveal">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-amber-600"></i>
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Warm Hospitality</h3>
                    <p class="text-gray-500 text-sm">Our team is dedicated to making your stay comfortable, memorable,
                        and truly Kenyan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section (optional) -->
    <section class="py-24 bg-cream">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Our Team</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Meet the People
                    Behind Chumba</h2>
                <p class="text-gray-500 text-base max-w-xl mx-auto">Passionate hospitality professionals dedicated to
                    your comfort.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team member 1 -->
                <div class="text-center reveal">
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4 border-4 border-amber-200">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy">John Kimani</h3>
                    <p class="text-amber-500 text-sm">General Manager</p>
                </div>
                <!-- Team member 2 -->
                <div class="text-center reveal">
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4 border-4 border-amber-200">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jane Wanjiku"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy">Jane Wanjiku</h3>
                    <p class="text-amber-500 text-sm">Head Chef</p>
                </div>
                <!-- Team member 3 -->
                <div class="text-center reveal">
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4 border-4 border-amber-200">
                        <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="Peter Omondi"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy">Peter Omondi</h3>
                    <p class="text-amber-500 text-sm">Events Coordinator</p>
                </div>
                <!-- Team member 4 -->
                <div class="text-center reveal">
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4 border-4 border-amber-200">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Mary Chebet"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy">Mary Chebet</h3>
                    <p class="text-amber-500 text-sm">Guest Relations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-16 bg-navy text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="font-[Cormorant_Garamond] text-3xl md:text-4xl text-white mb-4">Ready to experience Chumba?</h2>
            <p class="text-white/70 text-lg mb-8">Book your stay or event today.</p>
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
