<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;

new class extends Component
{
    public $galleries;
    public $selectedImage = null;
    public $showModal = false;

    public function mount()
    {
        $this->galleries = Gallery::orderBy('created_at', 'desc')->get();
    }

    public function showImage($id)
    {
        $this->selectedImage = Gallery::findOrFail($id);
        $this->showModal = true;
    }
};
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="relative h-[50vh] min-h-[400px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                alt="Chumba Resort gallery" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/70"></div>
        </div>
        <div class="relative z-10 px-6">
            <span class="text-amber-300 text-sm font-bold tracking-[0.18em] uppercase">Moments at Chumba</span>
            <h1 class="font-[Cormorant_Garamond] text-5xl md:text-6xl font-light text-white mt-3">Gallery</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4">Take a glimpse into the relaxing atmosphere,
                delicious cuisine, and beautiful spaces that make every stay memorable.</p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-24 bg-cream">
        <div class="max-w-7xl mx-auto px-6">
            @if($galleries->isEmpty())
            <p class="text-center text-gray-500">No images in the gallery yet.</p>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                <div wire:key="{{ $gallery->id }}"
                    class="relative overflow-hidden rounded-xl shadow-sm hover:shadow-xl cursor-pointer group reveal"
                    wire:click="showImage({{ $gallery->id }})">
                    <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery image' }}"
                        class="w-full h-64 md:h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                    @if($gallery->title || $gallery->category)
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
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
    </section>

    <!-- Lightbox Modal (Alpine) -->
    <div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Background overlay -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/90 transition-opacity"
                @click="open = false"></div>

            <!-- Modal content -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="relative z-50 max-w-4xl w-full"
                @click.away="open = false">
                @if($selectedImage)
                <div class="bg-white rounded-2xl overflow-hidden">
                    <img src="{{ Storage::url($selectedImage->image) }}"
                        alt="{{ $selectedImage->title ?? 'Gallery image' }}"
                        class="w-full max-h-[70vh] object-contain bg-gray-900">
                    <div class="p-6">
                        @if($selectedImage->title)
                        <h3 class="font-[Cormorant_Garamond] text-2xl font-semibold text-navy">{{ $selectedImage->title
                            }}</h3>
                        @endif
                        @if($selectedImage->category)
                        <span class="inline-block bg-amber-100 text-amber-700 text-xs px-3 py-1 rounded-full mt-2">
                            {{ $selectedImage->category }}
                        </span>
                        @endif
                        @if($selectedImage->description)
                        <p class="text-gray-600 text-base mt-4">{{ $selectedImage->description }}</p>
                        @endif
                        <button @click="open = false"
                            class="mt-6 w-full bg-navy hover:bg-amber-500 text-white py-3 rounded-full font-semibold text-sm transition-all">
                            Close
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
