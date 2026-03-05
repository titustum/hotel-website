<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $standard = RoomType::where('name', 'Standard Room')->first();
        $deluxe = RoomType::where('name', 'Deluxe Room')->first();

        for ($i = 1; $i <= 5; $i++) {
            Room::create([
                'room_type_id' => $standard->id,
                'room_number' => 'S10'.$i,
                'floor' => '1',
                'status' => 'available',
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Room::create([
                'room_type_id' => $deluxe->id,
                'room_number' => 'D20'.$i,
                'floor' => '2',
                'status' => 'available',
            ]);
        }
    }
}
