<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

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
