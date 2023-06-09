<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'document',
        'name',
        'last_name',
        'country',
        'city',
        'email',
        'phone',
        'address',
        'nationality',
        'birthdate',
        'grades',
        'postal_code',
        'region_code',
        'state',
        'customer_type_id', // foreign key for the CustomerType relationship
        // Add other customer attributes
    ];
   
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    // Add more relationships as needed
}
