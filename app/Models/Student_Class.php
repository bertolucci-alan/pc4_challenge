<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Class extends Model
{
    use HasFactory;

    protected $table = 'students_classes';

    protected $fillable = [
        'student_id',
        'class_id',
    ];
}