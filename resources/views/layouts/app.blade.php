{{-- resources\views\layouts\app.blade.php --}}

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


    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

<body class="bg-white text-gray-900 font-[Inter] overflow-x-hidden">

    <!-- ===== NAVBAR ===== -->
    <nav id="navbar"
        class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 lg:px-10 h-17.5 transition-all duration-300 bg-transparent }}">

        <a href="{{ route('home') }}" class="font-[Righteous] text-2xl text-white tracking-wide">
            Chumba <span class="text-amber-300">Resort</span>
        </a>

        <div class="hidden lg:flex items-center gap-8">

            <a href="{{ route('home') }}"
                class="hidden xl:inline text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Home
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{  route('accommodation') }}"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Accommodation
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{  route('restaurant') }}"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Restaurant & Bar
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="#conference"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Conference
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{  route('about') }}"
                class="hidden xl:inline text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                About
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{  route('contact') }}"
                class="text-white/90 text-sm font-medium uppercase tracking-widest hover:text-amber-300 transition-colors duration-300 relative group">
                Contact
                <span
                    class="absolute -bottom-0.5 left-0 w-0 h-px bg-amber-300 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <!-- CTA -->
            <a href="{{  route('book.room') }}"
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
            <button id="menuClose" class="text-white text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="flex flex-col gap-6">

            <a href="#home"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                Home
            </a>

            <a href="{{  route('accommodation') }}"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                Accommodation
            </a>

            <a href="{{  route('restaurant') }}"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                Restaurant & Bar
            </a>

            <a href="#conference"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                Conference
            </a>

            <a href="{{  route('about') }}"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                About
            </a>

            <a href="{{  route('contact') }}"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-white border-b border-white/10 pb-4 hover:text-amber-300 transition-colors">
                Contact
            </a>

            <a href="{{  route('book.room') }}"
                class="menu-link font-[Cormorant_Garamond] text-3xl font-light text-amber-300 border-b border-white/10 pb-4">
                Book Now
            </a>

        </nav>

        <div class="mt-auto flex flex-col gap-3">
            <a href="tel:+0723874428" class="flex items-center gap-3 text-white/70 text-sm">
                <i class="fas fa-phone-alt"></i> +0723 874 428
            </a>
            <a href="mailto:info@chumbaresort.com" class="flex items-center gap-3 text-white/70 text-sm">
                <i class="fas fa-envelope"></i> info@chumbaresort.com
            </a>
        </div>

    </div>

    <main class="min-h-[60vh]">
        {{ $slot }}
    </main>



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
                        <li><a href="{{  route('restaurant') }}"
                                class="text-sm hover:text-amber-300 transition-colors">Bar &
                                Restaurant</a></li>
                        <li><a href="{{  route('accommodation') }}"
                                class="text-sm hover:text-amber-300 transition-colors">Accommodation</a></li>
                        <li><a href="#conference" class="text-sm hover:text-amber-300 transition-colors">Conference</a>
                        </li>
                        <li><a href="{{  route('about') }}" class="text-sm hover:text-amber-300 transition-colors">About
                                Us</a></li>
                    </ul>
                </div>
                <div>
                    <div class="text-white text-xs font-bold uppercase tracking-[0.15em] mb-5">Services</div>
                    <ul class="space-y-3">
                        <li><a href="{{  route('accommodation') }}"
                                class="text-sm hover:text-amber-300 transition-colors">Standard
                                Rooms</a></li>
                        <li><a href="{{  route('accommodation') }}"
                                class="text-sm hover:text-amber-300 transition-colors">Deluxe
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
                <p>Designed by
                    <a href="http://github.com/titustum">Titus Tum</a>
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts

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
//   document.getElementById('heroBg').style.transform = 'scale(1)';

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
