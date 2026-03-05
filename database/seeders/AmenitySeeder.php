<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $amenities = [
            ['name' => 'Free WiFi'],
            ['name' => 'Air Conditioning'],
            ['name' => 'TV'],
            ['name' => 'Smart TV'],
            ['name' => 'En Suite Bathroom'],
            ['name' => 'Scenic View'],
            ['name' => 'Secure Parking'],
            ['name' => 'Room Service'],
        ];

        foreach ($amenities as $amenity) {
            Amenity::create($amenity);
        }
    }
}
