<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuCategory;
use App\Models\MenuItem;

new class extends Component
{
    public $category;
    public $menuItems;
    public $selectedItem = null;
    public $showModal = false;

    public function mount($categorySlug)
    {
        $this->category = MenuCategory::where('slug', $categorySlug)->firstOrFail();
        $this->menuItems = MenuItem::where('menu_category_id', $this->category->id)
            ->where('available', true)
            ->orderBy('name')
            ->get();
    }

    public function showDetails($itemId)
    {
        $this->selectedItem = MenuItem::with('category')->findOrFail($itemId);
        $this->showModal = true;
    }
}
?>


<div class="bg-cream py-24">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Header with back link -->
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('restaurant') }}"
                class="text-navy hover:text-amber-500 text-sm font-semibold uppercase tracking-wide flex items-center gap-2 transition-colors">
                <i class="fas fa-arrow-left"></i> Back to Menu
            </a>
        </div>

        <!-- Category Header -->
        <div class="text-center mb-16 reveal">
            <span class="text-xs font-bold tracking-[0.18em] uppercase text-amber-500 mb-3 block">{{ $category->name
                }}</span>
            <h1 class="font-[Cormorant_Garamond] text-4xl md:text-5xl font-light text-navy mb-4">{{ $category->name }}
            </h1>
            @if($category->description)
            <p class="text-gray-500 text-base leading-relaxed max-w-xl mx-auto">{{ $category->description }}</p>
            @endif
        </div>

        <!-- Full Menu Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">
            @foreach ($menuItems as $item)
            <div wire:key="{{ $item->id }}"
                class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 reveal group cursor-pointer"
                wire:click="showDetails({{ $item->id }})">
                <!-- Same card design as main page -->
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
    </div>

    <!-- Reuse the same modal component (can be extracted to a separate file if desired) -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                @click="open = false"></div>

            <!-- Modal panel -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                @if($selectedItem)
                <div class="relative">
                    <img src="{{ $selectedItem->image ? Storage::url($selectedItem->image) : 'https://via.placeholder.com/600x400' }}"
                        alt="{{ $selectedItem->name }}" class="w-full h-64 object-cover">
                    <button @click="open = false"
                        class="absolute top-3 right-3 bg-white rounded-full w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 shadow-md">
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
