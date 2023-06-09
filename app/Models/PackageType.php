<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'other_type',
        'status',
        // Add package type attributes
    ];

    // Add more relationships as needed
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
