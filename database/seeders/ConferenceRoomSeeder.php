<?php

namespace Database\Seeders;

use App\Models\ConferenceRoom;
use Illuminate\Database\Seeder;

class ConferenceRoomSeeder extends Seeder
{
    public function run(): void
    {
        ConferenceRoom::create([
            'name' => 'Small Conference Room',
            'description' => 'Ideal for focused meetings and workshops of up to 20 people.',
            'capacity' => 20,
            'price_per_day' => 10000,
        ]);

        ConferenceRoom::create([
            'name' => 'Medium Conference Room',
            'description' => 'Suitable for mid-sized gatherings up to 50 people.',
            'capacity' => 50,
            'price_per_day' => 15000,
        ]);
    }
}
