<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // Add other payment method attributes
    ];

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class);
    }

    // Add more relationships as needed
}
