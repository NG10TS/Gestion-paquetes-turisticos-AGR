<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        // Add reservation status attributes
    ];

    public function reservations()
    {
        return $this->hasMany(Booking::class);
    }

    // Add more relationships as needed
}
