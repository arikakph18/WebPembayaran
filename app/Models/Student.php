<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'table_students';

    protected $fillable = ['nama', 'status'];

    // Relasi ke PivotStudentClass (One-to-Many)
    public function pivotStudentClasses()
    {
        return $this->hasMany(PivotStudentClass::class, 'student_id', 'id');
    }

    // Relasi ke Product melalui PivotStudentClass (Many-to-Many)
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'pivot_student_clasess', // nama tabel pivot
            'student_id',           // foreign key di tabel pivot untuk model ini
            'product_id'            // foreign key di tabel pivot untuk model yang dituju
        );
    }
}
