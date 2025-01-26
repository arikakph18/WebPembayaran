<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'tanggal',
        'pengirim',
        'jumlah_transfer',
        'bulan_bayar',
        'selisih',
        'harga',
        'catatan',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Define a relationship to the Student model (assuming it exists).
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
