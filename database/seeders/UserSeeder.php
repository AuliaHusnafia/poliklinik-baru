<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // nama, email, password, role
        $users = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'pwadmin', // Menggunakan teks biasa menghindari double hashing di Laravel Modern
                'role' => 'admin',
            ],
            [
                'nama' => 'Dokter',
                'email' => 'dokter@gmail.com',
                'password' => 'dokter',
                'role' => 'dokter',
            ],
            [
                'nama' => 'Pasien',
                'email' => 'pasien@gmail.com',
                'password' => 'pasien',
                'role' => 'pasien',
            ],
        ];

        foreach ($users as $user) {
            // updateOrCreate mencegah error 'duplicate entry' jika seeder dijalankan ulang
            User::updateOrCreate(
                ['email' => $user['email']], 
                $user
            );
        }
    }
}