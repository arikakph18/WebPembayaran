<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_products', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nama_produk'); // Nama Produk
            $table->enum('tipe', ['Online', 'Offline']); // Tipe produk (Online/Offline)
            $table->string('level'); // Level produk (misalnya Beginner, Advanced)
            $table->integer('harga'); // Harga produk
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_products');
    }
};
