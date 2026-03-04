<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chumba Resort – Relax, Dine & Unwind</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400;1,600&family=Inter:wght@300;400;500;600&family=Righteous&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 font-[Inter] overflow-x-hidden">

    <!-- ===== NAVBAR ===== -->
    <nav id="navbar"
        class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 lg:px-10 h-17.5 transition-all duration-300 bg-transparent">
        <a href="#" class="font-[Righteous] text-2xl text-white tracking-wide">
            Chumba <span class="text-amber-300">Resort</span>
        </a>
        <div class="hidden lg:flex items-center gap-8">
            <a href="#restaurant"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Restaurant
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#accommodation"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Rooms
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#conference"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Conference
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#about"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                About
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#contact"
                class="bg-amber-500 hover:bg-amber-400 text-white text-sm font-semibold px-5 py-2.5 rounded-full tracking-wide transition-all duration-300 hover:scale-105">
                Book Now
            </a>
        </div>
        <button id="hamburger" class="lg:hidden text-white text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="fixed inset-0 z-200 bg-navy flex flex-col p-8 -translate-x-full transition-transform duration-400 ease-in-out">
        <div class="flex justify-between items-center mb-12">
            <span class="font-[Righteous] text-xl text-white">Chumba <span class="text-amber-300">Resort</span></span>
            <button id="menuClose" class="text-white text-2xl"><i class="fas fa-times"></i></button>
        </div>
        <nav class="flex flex-col gap-6">
            <a href="#restaurant"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">Bar
                & Restaurant</a>
            <a href="#accommodation"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">Accommodation</a>
            <a href="#conference"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">Conference</a>
            <a href="#about"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">About
                Us</a>
            <a href="#contact"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">Contact
                & Book</a>
        </nav>
        <div class="mt-auto flex flex-col gap-3">
            <a href="tel:+0723874428" class="flex items-center gap-3 text-white/70 text-sm"><i
                    class="fas fa-phone-alt"></i> +0723 874 428</a>
            <a href="mailto:info@chumbaresort.com" class="flex items-center gap-3 text-white/70 text-sm"><i
                    class="fas fa-envelope"></i> info@chumbaresort.com</a>
        </div>
    </div>

    <!-- ===== HERO ===== -->
    <section id="home"
        class="relative h-screen min-h-150 flex flex-col items-center justify-center text-center overflow-hidden">
        <!-- BG Image -->
        <div class="absolute inset-0 z-0 bg-cover bg-center scale-105 transition-transform duration-6000 ease-out"
            id="heroBg" style="background-image: url('{{ asset('images/oplique-resort-image.jpeg') }}');">
        </div>
        <!-- Overlay -->
        <div class="absolute inset-0 z-1 bg-linear-to-b from-[#0f1932]/60 via-[#0f1932]/70 to-[#0f1932]/85"></div>

        <div class="relative z-10 px-5 max-w-4xl mx-auto">
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 bg-amber-500/20 border border-amber-400/50 text-amber-300 text-xs font-bold tracking-[0.15em] uppercase px-4 py-1.5 rounded-full mb-6 animate-[fadeInDown_0.8s_ease_forwards]">
                <i class="fas fa-star text-[0.6rem]"></i> Premier Resort — Biretwo, Kenya
            </div>
            <!-- Title -->
            <h1
                class="font-[Cormorant_Garamond] text-5xl sm:text-6xl md:text-7xl font-light text-white leading-[1.1] tracking-tight mb-5 animate-[fadeInUp_0.9s_ease_0.2s_both]">
                Welcome to<br><em class="italic text-amber-300">Chumba Resort</em>
            </h1>
            <!-- Subtitle -->
            <p
                class="hidden md:block text-lg sm:text-xl text-white/80 font-light leading-relaxed max-w-xl mx-auto mb-10 animate-[fadeInUp_0.9s_ease_0.4s_both]">
                Relax, dine, and unwind at our premium resort nestled in Elgeyo Marakwet County. Where Kenyan
                hospitality meets refined comfort.
            </p>
            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 justify-center mb-12 animate-[fadeInUp_0.9s_ease_0.6s_both]">
                <a href="#accommodation"
                    class="inline-flex items-center gap-2.5 bg-amber-500 hover:bg-amber-400 text-white px-8 py-3.5 rounded-full text-base font-semibold tracking-wide transition-all duration-300 hover:-translate-y-0.5 shadow-[0_4px_20px_rgba(201,147,58,0.45)] hover:shadow-[0_8px_30px_rgba(201,147,58,0.55)]">
                    <i class="fas fa-bed"></i> Book a Room
                </a>
                <a href="https://maps.app.goo.gl/LSV9VGx7YfKtf28x6" target="_blank"
                    class="inline-flex items-center gap-2.5 bg-transparent border border-white/50 hover:border-white hover:bg-white/10 text-white px-7 py-3.5 rounded-full text-base font-medium transition-all duration-300">
                    <i class="fas fa-map-marker-alt"></i> Get Directions
                </a>
            </div>
            <!-- Quick links -->
            <div class="flex flex-wrap gap-8 justify-center animate-[fadeInUp_0.9s_ease_0.8s_both]">
                <a href="#restaurant"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300"><i
                        class="fas fa-utensils"></i> Bar & Dining</a>
                <a href="#conference"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300"><i
                        class="fas fa-users"></i> Conference</a>
                <a href="tel:+0723874428"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-amber-300 text-sm transition-colors duration-300"><i
                        class="fas fa-phone-alt"></i> +0723 874 428</a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <div class="w-7 h-11 border-2 border-white/40 rounded-[14px] flex items-start justify-center pt-1.5">
                <div class="w-1 h-2 bg-white rounded-full animate-[scrollDot_1.5s_infinite]"></div>
            </div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <div class="bg-navy py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-white/10">
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">24/7
                    </div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Always Open</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">2
                    </div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Room Types</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">4+
                    </div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Menu Offerings</div>
                </div>
                <div class="text-center px-8 py-6">
                    <div class="font-[Cormorant_Garamond] text-5xl font-semibold text-amber-300 leading-none mb-2">2
                    </div>
                    <div class="text-xs text-white/60 uppercase tracking-widest">Conference Rooms</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== BAR & RESTAURANT ===== -->
    <section id="restaurant" class="bg-cream py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Dining &
                    Bar</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Flavours of
                    Kenya</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">Experience authentic Kenyan cuisine
                    and a wide selection of drinks — from traditional dishes to refreshing cocktails and fine wines.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">

                <!-- Card 1 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/nyama-choma.webp') }}" alt="Nyama Choma"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Signature</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Nyama Choma</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Kenyan-style grilled meat — beef, goat or
                            chicken — served with Ugali, Kachumbari, and Sukuma Wiki.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold text-base">KES 1,200</span>
                            <a href="tel:+0723874428"
                                class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link">
                                Order <i
                                    class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="https://blog.thermoworks.com/wp-content/uploads/2016/07/bbq_chicken-27-of-39_3.jpg"
                            alt="Grilled Chicken"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Popular</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Grilled Chicken
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Tender, juicy grilled chicken served with
                            fries, Ugali, or a fresh garden salad. A timeless favourite.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold text-base">KES 950</span>
                            <a href="tel:+0723874428"
                                class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link">
                                Order <i
                                    class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="https://static.vecteezy.com/system/resources/previews/029/283/229/large_2x/a-front-view-fresh-fruit-cocktails-with-fresh-fruit-slices-ice-cooling-on-blue-drink-juice-co-free-photo.jpg"
                            alt="Cocktails"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Bar
                            Special</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Cocktails &
                            Juices</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">From the classic Dawa to tropical blends
                            and chilled fresh fruit juices for every palate.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold text-base">KES 600</span>
                            <a href="tel:+0723874428"
                                class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link">
                                Order <i
                                    class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="https://th.bing.com/th/id/OIP.OddfcDs2g7qn5y5xaOCsrgAAAA?rs=1&pid=ImgDetMain"
                            alt="Wines & Spirits"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span
                            class="absolute top-3 left-3 bg-navy text-white text-[0.65rem] font-semibold tracking-widest uppercase px-3 py-1 rounded-full">Premium</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Wines & Spirits
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">A curated selection of fine wines and
                            spirits — red, white, sparkling, and local and international spirits.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold text-base">KES 1,000</span>
                            <a href="tel:+0723874428"
                                class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link">
                                Order <i
                                    class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-14 reveal">
                <a href="tel:+0723874428"
                    class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fas fa-phone-alt"></i> Call for Reservations
                </a>
            </div>
        </div>
    </section>

    <!-- ===== ACCOMMODATION ===== -->
    <section id="accommodation" class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-14 reveal">
                <span
                    class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Accommodation</span>
                <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Rooms Designed
                    for Comfort</h2>
                <p class="text-gray-500 text-base leading-relaxed max-w-lg">Discover our premium rooms, crafted for
                    relaxation and refined comfort after a day of adventure.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">

                <!-- Room 1 -->
                <div
                    class="bg-cream rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1.5 transition-all duration-300 flex flex-col reveal group">
                    <div class="h-72 overflow-hidden relative">
                        <img src="https://westhighlandhotel.co.uk/wp-content/uploads/2021/03/IMG_3124-scaled.jpg"
                            alt="Standard Room"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">
                        <span
                            class="absolute top-4 right-4 bg-white text-navy text-xs font-bold tracking-[0.08em] uppercase px-4 py-1.5 rounded-full shadow-sm">Standard</span>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-2">Standard Room
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">A cozy, well-appointed room with all the
                            essentials for a comfortable overnight stay. Perfect for solo travellers and couples.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-wifi text-amber-400 text-[0.65rem]"></i> Free WiFi</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-snowflake text-amber-400 text-[0.65rem]"></i> A/C</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-tv text-amber-400 text-[0.65rem]"></i> TV</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-shower text-amber-400 text-[0.65rem]"></i> En Suite</span>
                        </div>
                        <div class="flex items-center justify-between mt-auto">
                            <div>
                                <span class="font-[Cormorant_Garamond] text-3xl font-semibold text-navy">KES
                                    1,000</span>
                                <span class="text-gray-400 text-xs ml-1">/night</span>
                            </div>
                            <a href="tel:+0723874428"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fas fa-bed text-xs"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Room 2 -->
                <div
                    class="bg-cream rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1.5 transition-all duration-300 flex flex-col reveal group">
                    <div class="h-72 overflow-hidden relative">
                        <img src="https://pix10.agoda.net/hotelImages/546712/-1/cb211141a42e03a0d7870da22ae9af57.jpg"
                            alt="Deluxe Room"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">
                        <span
                            class="absolute top-4 right-4 bg-white text-navy text-xs font-bold tracking-[0.08em] uppercase px-4 py-1.5 rounded-full shadow-sm">Deluxe</span>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-2">Deluxe Room
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Enjoy a spacious layout with premium
                            furnishings, scenic views, and elevated amenities for a truly special stay.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-wifi text-amber-400 text-[0.65rem]"></i> Free WiFi</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-snowflake text-amber-400 text-[0.65rem]"></i> A/C</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-tv text-amber-400 text-[0.65rem]"></i> Smart TV</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-shower text-amber-400 text-[0.65rem]"></i> En Suite</span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-white text-navy text-xs font-medium px-3 py-1.5 rounded-full border border-gray-200"><i
                                    class="fas fa-eye text-amber-400 text-[0.65rem]"></i> Scenic View</span>
                        </div>
                        <div class="flex items-center justify-between mt-auto">
                            <div>
                                <span class="font-[Cormorant_Garamond] text-3xl font-semibold text-navy">KES
                                    4,500</span>
                                <span class="text-gray-400 text-xs ml-1">/night</span>
                            </div>
                            <a href="tel:+0723874428"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fas fa-bed text-xs"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== CONFERENCE ===== -->
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

                <!-- Conf 1 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row reveal group">
                    <div class="sm:w-56 shrink-0 overflow-hidden">
                        <img src="https://image-tc.galaxy.tf/wijpeg-suka6t0aqzoafpzyi1ac6bct/imgl0338.jpg?width=1600&height=1066"
                            alt="Small Conference"
                            class="w-full h-52 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-7 flex flex-col justify-center">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Small Conference
                            Room</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Ideal for focused meetings and workshops
                            of up to 20 people.</p>
                        <ul class="space-y-1.5 mb-5">
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Projector & Screen</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> High-Speed WiFi</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Tea & Coffee Break</li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold">KES 10,000 / day</span>
                            <a href="tel:+0723874428"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-xs font-semibold px-5 py-2 rounded-full transition-all duration-300">Enquire</a>
                        </div>
                    </div>
                </div>

                <!-- Conf 2 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row reveal group">
                    <div class="sm:w-56 shrink-0 overflow-hidden">
                        <img src="https://www.wakenyawataliitourstravel.com/wp-content/uploads/2023/05/Conferences-1290x540.jpg"
                            alt="Medium Conference"
                            class="w-full h-52 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-7 flex flex-col justify-center">
                        <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">Medium
                            Conference Room</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">For mid-sized gatherings of up to 50
                            people, fully equipped for all event types.</p>
                        <ul class="space-y-1.5 mb-5">
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> LCD Projector + Smart TV</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Catering Available</li>
                            <li class="flex items-center gap-2 text-sm text-gray-600"><i
                                    class="fas fa-check text-amber-400 text-xs"></i> Flexible Layout</li>
                        </ul>
                        <div class="flex items-center justify-between">
                            <span class="text-amber-500 font-bold">KES 15,000 / day</span>
                            <a href="tel:+0723874428"
                                class="inline-flex items-center gap-2 bg-navy hover:bg-amber-500 text-white text-xs font-semibold px-5 py-2 rounded-full transition-all duration-300">Enquire</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== ABOUT ===== -->
    <section id="about" class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Image side -->
                <div class="relative reveal">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://media.expedia.com/media/content/shared/images/travelguides/sem-hotels-tablet.jpg?impolicy=fcrop&w=1920&h=480&q=medium"
                            alt="Chumba Resort" class="w-full h-115 object-cover">
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
                    <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-5">A
                        Destination Unlike Any Other</h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-6">Chumba Resort, located in Biretwo, Elgeyo
                        Marakwet County, offers a premier destination for relaxation, luxurious accommodations, fine
                        dining, and a vibrant bar — designed to provide you with the utmost comfort and unforgettable
                        experiences.</p>
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

    <!-- ===== CONTACT ===== -->
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
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Phone</div>
                                <a href="tel:+0723874428"
                                    class="text-white hover:text-amber-300 transition-colors text-sm">+0723 874 428</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-300 text-sm shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Email</div>
                                <a href="mailto:info@chumbaresort.com"
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
                                <div class="text-[0.7rem] uppercase tracking-widest text-white/40 mb-1">Hours</div>
                                <span class="text-white text-sm">Open 24 Hours, Every Day</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Form -->
                <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl reveal">
                    <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-7">Send a Message</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Full
                                Name</label>
                            <input type="text" placeholder="Your name"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Phone</label>
                            <input type="tel" placeholder="+254 700 000 000"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Email
                            Address</label>
                        <input type="email" placeholder="your@email.com"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Interested
                            In</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all text-gray-600">
                            <option value="">— Select a service —</option>
                            <option>Accommodation</option>
                            <option>Bar & Restaurant</option>
                            <option>Conference Room</option>
                            <option>General Enquiry</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Your
                            Message</label>
                        <textarea rows="4" placeholder="Tell us how we can help…"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all resize-none"></textarea>
                    </div>
                    <button
                        class="w-full py-3.5 bg-navy hover:bg-amber-500 text-white font-semibold text-sm rounded-full flex items-center justify-center gap-2.5 transition-all duration-300 hover:-translate-y-0.5 tracking-wide">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MAP ===== -->
    <div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.820231519588!2d35.55000836001407!3d0.5410015830328788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x17811f00200d5485%3A0x921de6ead9e75f29!2sCHUMBA%20RESORT%20BAR%20AND%20RESTAURANT!5e0!3m2!1ssw!2ske!4v1741434619698!5m2!1ssw!2ske"
            class="w-full h-96 block" style="filter:grayscale(15%)" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-[#111926] text-white/60 pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <div>
                    <div class="font-[Righteous] text-xl text-white mb-4">Chumba <span
                            class="text-amber-300">Resort</span></div>
                    <p class="text-sm leading-relaxed mb-6">Your premier destination for relaxation, fine dining, and
                        unforgettable experiences in the heart of Elgeyo Marakwet, Kenya.</p>
                    <div class="flex gap-3">
                        <a href="https://facebook.com" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-500 flex items-center justify-center text-white/70 hover:text-white transition-all duration-300 text-sm"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-500 flex items-center justify-center text-white/70 hover:text-white transition-all duration-300 text-sm"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-500 flex items-center justify-center text-white/70 hover:text-white transition-all duration-300 text-sm"><i
                                class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div>
                    <div class="text-white text-xs font-bold uppercase tracking-[0.15em] mb-5">Explore</div>
                    <ul class="space-y-3">
                        <li><a href="#restaurant" class="text-sm hover:text-amber-300 transition-colors">Bar &
                                Restaurant</a></li>
                        <li><a href="#accommodation"
                                class="text-sm hover:text-amber-300 transition-colors">Accommodation</a></li>
                        <li><a href="#conference" class="text-sm hover:text-amber-300 transition-colors">Conference</a>
                        </li>
                        <li><a href="#about" class="text-sm hover:text-amber-300 transition-colors">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <div class="text-white text-xs font-bold uppercase tracking-[0.15em] mb-5">Services</div>
                    <ul class="space-y-3">
                        <li><a href="#accommodation" class="text-sm hover:text-amber-300 transition-colors">Standard
                                Rooms</a></li>
                        <li><a href="#accommodation" class="text-sm hover:text-amber-300 transition-colors">Deluxe
                                Rooms</a></li>
                        <li><a href="#conference" class="text-sm hover:text-amber-300 transition-colors">Small
                                Conference</a></li>
                        <li><a href="#conference" class="text-sm hover:text-amber-300 transition-colors">Medium
                                Conference</a></li>
                    </ul>
                </div>
                <div>
                    <div class="text-white text-xs font-bold uppercase tracking-[0.15em] mb-5">Contact</div>
                    <ul class="space-y-3">
                        <li><a href="tel:+0723874428" class="text-sm hover:text-amber-300 transition-colors">+0723 874
                                428</a></li>
                        <li><a href="mailto:info@chumbaresort.com"
                                class="text-sm hover:text-amber-300 transition-colors">info@chumbaresort.com</a></li>
                        <li><a href="https://maps.app.goo.gl/LSV9VGx7YfKtf28x6" target="_blank"
                                class="text-sm hover:text-amber-300 transition-colors">Biretwo, Kenya</a></li>
                        <li><span class="text-sm text-white/30">Open 24 Hours</span></li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-white/10 pt-7 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs">
                <p>© 2025 Chumba Resort. All rights reserved.</p>
                <p>Designed with ♥ in Kenya</p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll-aware navbar
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('bg-navy', 'shadow-lg', '!h-[60px]');
      navbar.classList.remove('bg-transparent');
    } else {
      navbar.classList.remove('bg-navy', 'shadow-lg', '!h-[60px]');
      navbar.classList.add('bg-transparent');
    }
  });

  // Mobile menu
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuClose = document.getElementById('menuClose');
  document.querySelectorAll('.menu-link').forEach(l => l.addEventListener('click', () => mobileMenu.classList.remove('translate-x-0')));
  hamburger.addEventListener('click', () => mobileMenu.classList.add('translate-x-0'));
  menuClose.addEventListener('click', () => mobileMenu.classList.remove('translate-x-0'));

  // Hero Ken Burns
  document.getElementById('heroBg').style.transform = 'scale(1)';

  // Scroll reveal
  const revealEls = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
        }, (e.target.dataset.delay || 0));
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  revealEls.forEach((el, i) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(28px)';
    el.style.transition = 'opacity 0.65s ease, transform 0.65s ease';
    // Stagger siblings in same grid
    const parent = el.parentElement;
    const siblings = parent.querySelectorAll('.reveal');
    const idx = Array.from(siblings).indexOf(el);
    el.dataset.delay = idx * 100;
    io.observe(el);
  });
    </script>
</body>

</html>