<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Tambahkan ini
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Ubah sesuai kebutuhan
            'role' => 'admin', // Pastikan tabel memiliki kolom 'role'
        ]);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('owner123'), // Ubah sesuai kebutuhan
            'role' => 'owner',
        ]);
    }
}
