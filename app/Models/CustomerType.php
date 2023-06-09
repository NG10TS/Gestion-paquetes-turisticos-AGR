<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        // Add other customer type fields as needed
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    // Add more relationships as needed
}
