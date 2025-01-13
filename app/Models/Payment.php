<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Nama tabel di database
    protected $table = 'payments'; // Mengacu ke tabel 'payments'

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'tanggal',          // Tanggal pembayaran
        'data_bank',        // Data bank
        'jumlah_transfer',  // Jumlah transfer
        'month',            // Bulan pembayaran
        'nama_anak',        // Nama anak
        'level',            // Level anak (contoh: Scratch)
        'kelas',            // Jenis kelas (Offline/Online)
        'status',           // Status pembayaran (Active/Inactive)
        'lebih_kurang',     // Kelebihan/Kekurangan pembayaran
        'note',             // Catatan tambahan
        'harga'
    ];
}
