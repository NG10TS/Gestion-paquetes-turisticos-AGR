<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'state',
        // Add product category attributes
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Add more relationships as needed
}
