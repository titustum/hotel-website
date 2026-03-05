<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['title' => 'Resort View', 'category' => 'resort'],
            ['title' => 'Deluxe Room', 'category' => 'rooms'],
            ['title' => 'Standard Room', 'category' => 'rooms'],
            ['title' => 'Restaurant Dining', 'category' => 'food'],
            ['title' => 'Nyama Choma Dish', 'category' => 'food'],
            ['title' => 'Conference Setup', 'category' => 'conference'],
        ];

        foreach ($images as $image) {
            Gallery::create([
                'title' => $image['title'],
                'category' => $image['category'],
                'image' => 'gallery/sample.jpg',
            ]);
        }
    }
}
