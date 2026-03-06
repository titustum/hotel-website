<?php

//resources\views\pages\⚡restaurant.blade.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuCategory;
use App\Models\MenuItem;

new class extends Component
{
    public $categories;
    public $selectedItem = null;
    public $showModal = false;

    // Optional: limit items per category (e.g., 4)
    public $itemsPerCategory = 4;

    public function mount()
    {
        $this->loadMenu();
    }

    public function loadMenu()
    {
        // Load categories that have at least one available menu item,
        // and eager load the available items (limited to $itemsPerCategory)
        $this->categories = MenuCategory::with(['menuItems' => function ($query) {
            $query->where('available', true)
                  ->orderBy('name')
                  ->take($this->itemsPerCategory); // remove take() to show all
        }])
        ->whereHas('menuItems', function ($query) {
            $query->where('available', true);
        })
        ->orderBy('name') // or order by a custom 'sort_order' column if you have one
        ->get();
    }

    public function showDetails($itemId)
    {
        $this->selectedItem = MenuItem::with('category')->findOrFail($itemId);
        $this->showModal = true;
    }
}

?>


<div class="bg-cream pb-24">

    <!-- Hero Section (smaller than homepage) -->
    <section class="relative h-[50vh] min-h-100 flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/nyama-choma.webp') }}" alt="Chumba Resort landscape"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Bar and Restaurant</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Chumba Resort</h1>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-6">

        <!-- Section Header -->
        <div class="text-center mb-16 mt-12 reveal">
            <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">Dining & Bar</span>
            <h2 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">Flavours of Kenya</h2>
            <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">
                Experience authentic Kenyan cuisine and a wide selection of drinks — from traditional dishes to
                refreshing cocktails and fine wines.
            </p>
        </div>

        <!-- Loop through categories -->
        @forelse($categories as $category)
        <!-- Category heading (optional) -->
        @if($categories->count() > 1)

        <div class="mb-8 mt-12 first:mt-0 flex items-center justify-between">

            <h3
                class="font-[Cormorant_Garamond] text-3xl font-light text-navy border-b border-amber-200 pb-2 inline-block">
                {{ $category->name }}
            </h3>

            <a href="{{ route('menu.category', $category->slug) }}"
                class="font-[Cormorant_Garamond] text-base font-semibold text-amber-500 hover:text-navy transition flex items-center gap-1">

                View More
                <i class="fas fa-chevron-right text-xs"></i>

            </a>

        </div>

        @endif

        <!-- Menu Grid for this category -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">
            @foreach ($category->menuItems->take(4) as $item)
            <div wire:key="{{ $item->id }}"
                class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group cursor-pointer"
                wire:click="showDetails({{ $item->id }})">
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ $item->image ? Storage::url($item->image) : 'https://via.placeholder.com/400x300' }}"
                        alt="{{ $item->name }}"
                        class="w-full h-full object-contain py-3 group-hover:scale-105 transition-transform duration-500">
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
                    <h3 class="font-[Cormorant_Garamond] text-xl font-semibold text-navy mb-2">{{ $item->name }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">
                        {{ \Str::limit($item->description, 80) }}
                    </p>
                    <div class="flex items-center justify-between" wire:click.stop>
                        <span class="text-amber-500 font-bold text-base">KES {{ number_format($item->price) }}</span>
                        <a href="tel:+0723874428"
                            class="text-navy hover:text-amber-500 text-xs font-semibold uppercase tracking-wide flex items-center gap-1.5 transition-colors group/link"
                            onclick="event.stopPropagation()">
                            Order <i class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @empty
        <p class="text-center text-gray-500">No menu items available at the moment.</p>
        @endforelse

        <!-- Call to Action -->
        <div class="text-center mt-14 reveal">
            <a href="tel:+0723874428"
                class="inline-flex items-center gap-2.5 bg-navy hover:bg-amber-500 text-white px-8 py-3.5 rounded-full font-semibold text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5">
                <i class="fas fa-phone-alt"></i> Call for Reservations
            </a>
        </div>
    </div>

    <!-- Details Modal (Alpine.js) – fixed z-index & scrolling -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <!-- Background overlay (lower z-index) -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" @click="open = false"></div>

        <!-- Modal panel (higher z-index, centered, scrollable) -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative z-50 flex items-center justify-center min-h-screen px-4 py-6 pointer-events-none">

            <div
                class="bg-white rounded-2xl text-left shadow-xl transform transition-all max-w-lg w-full max-h-[90vh] overflow-y-auto pointer-events-auto">
                @if($selectedItem)
                <div class="relative">
                    <img src="{{ $selectedItem->image ? Storage::url($selectedItem->image) : 'https://via.placeholder.com/600x400' }}"
                        alt="{{ $selectedItem->name }}" class="w-full h-64 object-contain py-2 md:py-3">
                    <button @click="open = false"
                        class="absolute top-3 right-3 bg-white rounded-full w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 shadow-md z-10">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="px-6 py-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-[Cormorant_Garamond] text-3xl font-semibold text-navy">{{ $selectedItem->name }}
                        </h3>
                        <span class="text-amber-500 font-bold text-xl">KES {{ number_format($selectedItem->price)
                            }}</span>
                    </div>
                    @if($selectedItem->category)
                    <span class="inline-block bg-amber-100 text-amber-700 text-xs px-3 py-1 rounded-full mb-4">
                        {{ $selectedItem->category->name }}
                    </span>
                    @endif
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        {{ $selectedItem->description }}
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @if($selectedItem->is_signature)
                        <span class="bg-navy text-white text-xs px-3 py-1 rounded-full">Signature</span>
                        @endif
                        @if($selectedItem->is_popular)
                        <span class="bg-navy text-white text-xs px-3 py-1 rounded-full">Popular</span>
                        @endif
                        @if($selectedItem->is_premium)
                        <span class="bg-navy text-white text-xs px-3 py-1 rounded-full">Premium</span>
                        @endif
                    </div>
                    <a href="tel:+0723874428"
                        class="w-full bg-amber-500 hover:bg-amber-400 text-white font-semibold py-3 rounded-full flex items-center justify-center gap-2 transition-all duration-300">
                        <i class="fas fa-phone-alt"></i> Call to Order
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
