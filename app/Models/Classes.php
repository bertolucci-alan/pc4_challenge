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
}