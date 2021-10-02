<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, foreignKey: 'school_id', localKey: 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, foreignKey: 'school_id', localKey: 'id');
    }
}