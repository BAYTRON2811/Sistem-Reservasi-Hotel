<?php
 
namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
 
class UserSeeder extends Seeder
{
    /**
     * Seed akun admin dan beberapa akun user untuk kebutuhan testing.
     */
    public function run(): void
    {
        // Akun admin utama.
        // updateOrCreate dipakai (bukan create) supaya seeder aman
        // dijalankan berkali-kali tanpa error "email already exists".
        User::updateOrCreate(
            ['email' => 'admin@hotel.test'],
            [
                'name' => 'Admin Hotel',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
 
        // Beberapa akun user biasa untuk mencoba alur booking, login, dsb.
        $users = [
            ['name' => 'Budi Santoso', 'email' => 'budi@example.com'],
            ['name' => 'Siti Aminah', 'email' => 'siti@example.com'],
            ['name' => 'Andi Wijaya', 'email' => 'andi@example.com'],
        ];
 
        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('password'),
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}