<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'location', 
        'other_fields'
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}