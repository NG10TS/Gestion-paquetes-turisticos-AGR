<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 
        'client_id', 
        'payment_type_id', 
        'reservation_date', 
        'other_fields'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
