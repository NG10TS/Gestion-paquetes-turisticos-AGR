<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'presentation',
        'unified_product',
        'image',
        'product_creation_date',
        'product_update_date',
        // Add product attributes
        'category_id',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // Add more relationships as needed
}
