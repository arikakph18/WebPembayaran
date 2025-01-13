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
            $table->id(); // Kolom ID otomatis
            $table->date('tanggal'); // Kolom tanggal untuk menyimpan tanggal pembayaran
            $table->string('data_bank'); // Kolom untuk nama bank
            $table->decimal('jumlah_transfer', 15, 2); // Kolom jumlah transfer (format desimal)
            $table->string('month'); // Kolom untuk bulan pembayaran
            $table->string('nama_anak'); // Kolom untuk nama anak
            $table->string('level'); // Kolom level (misalnya Scratch)
            $table->string('kelas'); // Kolom kelas (Offline/Online)
            $table->string('status'); // Kolom status (Active/Inactive)
            $table->string('lebih_kurang')->nullable(); // Kolom untuk lebih/kurang (bisa kosong)
            $table->string('note')->nullable(); // Kolom untuk catatan (opsional)
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
