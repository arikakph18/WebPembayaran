<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'table_products';

    protected $fillable = [
        'nama_produk',
        'tipe',
        'level',
        'harga',
    ];

    // Relasi ke PivotStudentClass (One-to-Many)
    public function pivotStudentClasses()
    {
        return $this->hasMany(PivotStudentClass::class, 'product_id', 'id');
    }

    // Relasi ke Student melalui PivotStudentClass (Many-to-Many)
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'pivot_student_clasess', // nama tabel pivot
            'product_id',           // foreign key di tabel pivot untuk model ini
            'student_id'            // foreign key di tabel pivot untuk model yang dituju
        );
    }
}
