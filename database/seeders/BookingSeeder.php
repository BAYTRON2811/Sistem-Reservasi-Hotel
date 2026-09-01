<?php
 
namespace Database\Seeders;
 
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
 
class BookingSeeder extends Seeder
{
    /**
     * Seed beberapa contoh booking dengan status berbeda-beda,
     * supaya dashboard admin & halaman booking langsung ada data untuk dicoba.
     *
     * Catatan: seeder ini butuh UserSeeder dan RoomSeeder sudah jalan duluan
     * (lihat urutan pemanggilan di DatabaseSeeder).
     */
    public function run(): void
    {
        $rooms = Room::all();
        $users = User::where('role', 'user')->get();
 
        if ($rooms->isEmpty() || $users->isEmpty()) {
            return;
        }
 
        $sampleBookings = [
            [
                'room_number' => '101',
                'user_email' => 'budi@example.com',
                'check_in' => now()->subDays(2),
                'check_out' => now()->addDays(1),
                'status' => 'occupied',
            ],
            [
                'room_number' => '201',
                'user_email' => 'siti@example.com',
                'check_in' => now()->addDays(3),
                'check_out' => now()->addDays(5),
                'status' => 'confirmed',
            ],
            [
                'room_number' => '301',
                'user_email' => 'andi@example.com',
                'check_in' => now()->addDays(7),
                'check_out' => now()->addDays(9),
                'status' => 'pending',
            ],
            [
                'room_number' => '102',
                'user_email' => 'budi@example.com',
                'check_in' => now()->subDays(10),
                'check_out' => now()->subDays(8),
                'status' => 'completed',
            ],
        ];
 
        foreach ($sampleBookings as $data) {
            $room = $rooms->firstWhere('room_number', $data['room_number']);
            $user = $users->firstWhere('email', $data['user_email']);
 
            if (! $room || ! $user) {
                continue;
            }
 
            $nights = max($data['check_in']->diffInDays($data['check_out']), 1);
 
            Booking::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'check_in' => $data['check_in']->toDateString(),
                ],
                [
                    'check_out' => $data['check_out']->toDateString(),
                    'total_price' => $room->price * $nights,
                    'status' => $data['status'],
                ]
            );
        }
    }
}