<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        // Add sale detail attributes
    ];

    // Define the relationship with the Sale model
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // Add more relationships as needed
}
