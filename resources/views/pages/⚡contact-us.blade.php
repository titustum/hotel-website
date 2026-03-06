<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

new class extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $service_interest = '';
    public $message = '';

    protected function rules()
    {
        return [
            'name'              => 'required|string|min:3',
            'phone'             => 'required|string|min:10',
            'email'             => 'nullable|email',
            'service_interest'  => 'nullable|string|max:100',
            'message'           => 'required|string|min:10',
        ];
    }

    protected $messages = [
        'name.required'    => 'Please enter your full name.',
        'phone.required'   => 'Please enter your phone number.',
        'message.required' => 'Please enter your message.',
        'message.min'      => 'Your message must be at least 10 characters.',
    ];

    public function submit()
    {
        $this->validate();

        ContactMessage::create([
            'name'             => $this->name,
            'phone'            => $this->phone,
            'email'            => $this->email,
            'service_interest' => $this->service_interest,
            'message'          => $this->message,
            'status'           => 'new',
        ]);

        session()->flash('success', 'Thank you for contacting us! We will get back to you shortly.');

        $this->reset(['name', 'phone', 'email', 'service_interest', 'message']);
    }

}

?>

<div class="bg-white">
    <!-- Hero Section (smaller) -->
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/oplique-resort-image.jpeg') }}" alt="Chumba Resort contact"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Get in Touch</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Contact Us</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4">We'd love to hear from you. Reach out with any
                questions or to make a reservation.</p>
        </div>
    </section>

    <!-- Contact Info + Form -->
    <section class="py-24 bg-cream">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Success message -->
            @if (session()->has('success'))
            <div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.4fr] gap-14 items-start">
                <!-- Contact Information -->
                <div class="reveal">
                    <h2 class="font-[Cormorant_Garamond] text-3xl font-light text-navy mb-8">Visit or Reach Us</h2>
                    <ul class="divide-y divide-white/30">
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-600 text-sm shrink-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-navy/40 mb-1">Phone</div>
                                <a href="tel:+0723874428"
                                    class="text-navy hover:text-amber-600 transition-colors text-sm">+0723 874 428</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-600 text-sm shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-navy/40 mb-1">Email</div>
                                <a href="mailto:info@chumbaresort.com"
                                    class="text-navy hover:text-amber-600 transition-colors text-sm">info@chumbaresort.com</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-600 text-sm shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-navy/40 mb-1">Location</div>
                                <span class="text-navy text-sm">Stabex Biretwo, Elgeyo Marakwet County, Kenya</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-5 py-5">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-600 text-sm shrink-0">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <div class="text-[0.7rem] uppercase tracking-widest text-navy/40 mb-1">Hours</div>
                                <span class="text-navy text-sm">Open 24 Hours, Every Day</span>
                            </div>
                        </li>
                    </ul>

                    <!-- Social links -->
                    <div class="mt-8">
                        <p class="text-sm font-semibold text-navy mb-3">Follow Us</p>
                        <div class="flex gap-3">
                            <a href="https://facebook.com" target="_blank"
                                class="w-10 h-10 rounded-full bg-navy hover:bg-amber-500 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://instagram.com" target="_blank"
                                class="w-10 h-10 rounded-full bg-navy hover:bg-amber-500 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank"
                                class="w-10 h-10 rounded-full bg-navy hover:bg-amber-500 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl reveal">
                    <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy mb-7">Send a Message</h3>
                    <form wire:submit="submit">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Full Name
                                    *</label>
                                <input type="text" wire:model="name" placeholder="Your name"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                                @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Phone *</label>
                                <input type="tel" wire:model="phone" placeholder="+254 700 000 000"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                                @error('phone') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Email
                                (optional)</label>
                            <input type="email" wire:model="email" placeholder="your@email.com"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                            @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Interested
                                In</label>
                            <select wire:model="service_interest"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all">
                                <option value="">— Select a service —</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="Bar & Restaurant">Bar & Restaurant</option>
                                <option value="Conference Room">Conference Room</option>
                                <option value="General Enquiry">General Enquiry</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label class="block text-xs font-semibold text-navy mb-2 tracking-wide">Your Message
                                *</label>
                            <textarea wire:model="message" rows="4" placeholder="Tell us how we can help…"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20 bg-gray-50 transition-all resize-none"></textarea>
                            @error('message') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit"
                            class="w-full py-3.5 bg-navy hover:bg-amber-500 text-white font-semibold text-sm rounded-full flex items-center justify-center gap-2.5 transition-all duration-300 hover:-translate-y-0.5 tracking-wide">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.820231519588!2d35.55000836001407!3d0.5410015830328788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x17811f00200d5485%3A0x921de6ead9e75f29!2sCHUMBA%20RESORT%20BAR%20AND%20RESTAURANT!5e0!3m2!1ssw!2ske!4v1741434619698!5m2!1ssw!2ske"
            class="w-full h-96 block" style="filter:grayscale(15%)" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
</div>
