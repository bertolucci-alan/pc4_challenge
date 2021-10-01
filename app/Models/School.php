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

    public function class()
    {
        return $this->hasMany(Classes::class, foreignKey: 'school_id', localKey: 'id');
    }
}