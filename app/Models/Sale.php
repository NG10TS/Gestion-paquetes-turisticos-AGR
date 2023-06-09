<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        // Add other fillable attributes
    ];

    // Define relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentDetail()
    {
        return $this->belongsTo(PaymentDetail::class);
    }

    // Add more relationships as needed
}
