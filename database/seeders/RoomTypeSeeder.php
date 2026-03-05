<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use Illuminate\Support\Str;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        RoomType::create([
            'name' => 'Standard Room',
            'slug' => Str::slug('Standard Room'),
            'description' => 'A cozy, well-appointed room with all the essentials for a comfortable overnight stay.',
            'price_per_night' => 1000,
            'capacity' => 2,
            'featured' => true,
        ]);

        RoomType::create([
            'name' => 'Deluxe Room',
            'slug' => Str::slug('Deluxe Room'),
            'description' => 'Spacious room with premium furnishings and scenic views.',
            'price_per_night' => 4500,
            'capacity' => 3,
            'featured' => true,
        ]);
    }
}
