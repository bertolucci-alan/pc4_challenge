<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'year',
        'level',
        'grade',
        'day',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, foreignKey: 'school_id', ownerKey: 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, table: 'students_classes', foreignPivotKey: 'class_id', relatedPivotKey: 'student_id',);
    }
}