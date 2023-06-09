<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_date',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'booking_notes',
        'status',
        'user_id',
        'customer_id',
        'payment_type_id',
        'sale_id',
        // Add other fields specific to the reservation table
        // Add any other fields from the bookings table
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
