<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        // Add other entertainment fields as needed
    ];
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
