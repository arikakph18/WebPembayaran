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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->bigInteger('student_id'); // Foreign key ke tabel students
            $table->date('tanggal'); // Kolom tanggal pembayaran
            $table->string('pengirim'); // Kolom nama pengirim
            $table->integer('jumlah_transfer'); // Kolom jumlah transfer
            $table->string('bulan_bayar'); // Kolom bulan pembayaran
            $table->string('selisih')->nullable(); // Kolom selisih, bisa null
            $table->integer('harga'); // Kolom harga
            $table->string('level')->nullable(); // Kolom level, bisa null
            $table->string('status')->nullable(); // Kolom status, bisa null
            $table->text('catatan')->nullable(); // Kolom catatan, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
