<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Robotics Class
        $roboticsClasses = [
            ['nama_produk' => 'Robotics Class', 'tipe' => 'Offline', 'level' => 'Creativity', 'harga' => 400000],
            ['nama_produk' => 'Robotics Class', 'tipe' => 'Offline', 'level' => 'Construction', 'harga' => 470000],
            ['nama_produk' => 'Robotics Class', 'tipe' => 'Offline', 'level' => 'Robotics', 'harga' => 550000],
        ];

        // Data Coding Class
        $codingClasses = [
            ['nama_produk' => 'Coding Class', 'tipe' => 'Online', 'level' => 'Scratch Jr', 'harga' => 425000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Offline', 'level' => 'Scratch', 'harga' => 450000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Online', 'level' => 'AI', 'harga' => 550000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Offline', 'level' => 'Arduino', 'harga' => 650000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Online', 'level' => 'MIT', 'harga' => 525000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Offline', 'level' => 'Python', 'harga' => 650000],
            ['nama_produk' => 'Coding Class', 'tipe' => 'Online', 'level' => 'Web', 'harga' => 650000],
        ];

        // Gabungkan semua data
        $allProducts = array_merge($roboticsClasses, $codingClasses);

        // Insert data ke database
        Product::insert($allProducts);
    }
}
