<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'email',
        'phone',
        'birth',
        'gender',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, foreignKey: 'school_id', ownerKey: 'id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, table: 'students_classes', foreignPivotKey: 'student_id', relatedPivotKey: 'class_id',);
    }
}