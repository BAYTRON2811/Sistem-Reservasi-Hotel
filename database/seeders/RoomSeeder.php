<?php
 
namespace Database\Seeders;
 
use App\Models\Room;
use Illuminate\Database\Seeder;
 
class RoomSeeder extends Seeder
{
    /**
     * Seed data kamar dengan variasi tipe, harga, deskripsi, dan status.
     */
    public function run(): void
    {
        $rooms = [
            [
                'room_number' => '101',
                'room_type' => 'Standard',
                'price' => 300000,
                'description' => 'Kamar standar dengan 1 double bed, cocok untuk solo traveler maupun pasangan.',
                'status' => true,
            ],
            [
                'room_number' => '102',
                'room_type' => 'Standard',
                'price' => 300000,
                'description' => 'Kamar standar dengan pemandangan taman dan akses mudah ke lobby.',
                'status' => true,
            ],
            [
                'room_number' => '201',
                'room_type' => 'Deluxe',
                'price' => 500000,
                'description' => 'Kamar deluxe lebih luas, dilengkapi AC dan smart TV.',
                'status' => true,
            ],
            [
                'room_number' => '202',
                'room_type' => 'Deluxe',
                'price' => 500000,
                'description' => 'Kamar deluxe dengan balkon pribadi menghadap kolam renang.',
                'status' => true,
            ],
            [
                'room_number' => '301',
                'room_type' => 'Suite',
                'price' => 800000,
                'description' => 'Suite mewah dengan ruang tamu terpisah dan minibar.',
                'status' => true,
            ],
            [
                'room_number' => '302',
                'room_type' => 'Suite',
                'price' => 800000,
                'description' => 'Suite mewah dengan bathtub dan pemandangan kota. Sedang dalam perawatan.',
                'status' => false, // contoh kamar yang sedang tidak tersedia
            ],
        ];
 
        foreach ($rooms as $room) {
            // updateOrCreate berdasarkan room_number supaya seeder idempotent
            // (aman dijalankan ulang, tidak membuat kamar duplikat).
            Room::updateOrCreate(
                ['room_number' => $room['room_number']],
                $room
            );
        }
    }
}