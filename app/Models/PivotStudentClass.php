<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotStudentClass extends Model
{
    use HasFactory;

    protected $table = 'pivot_student_clasess';

    protected $fillable = ['student_id', 'product_id'];

    // Relasi ke Student (Many-to-One)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // Relasi ke Product (Many-to-One)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
