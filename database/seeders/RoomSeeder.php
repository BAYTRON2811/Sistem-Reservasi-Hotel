<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'room_number' => '101',
            'room_type' => 'Standard',
            'price' => 300000,
        ]);

        Room::create([
            'room_number' => '201',
            'room_type' => 'Deluxe',
            'price' => 500000,
        ]);

        Room::create([
            'room_number' => '301',
            'room_type' => 'Suite',
            'price' => 800000,
        ]);
    }
}