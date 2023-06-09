<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        // Add other activity fields as needed
    ];
    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    // Add other relationships as needed
}
