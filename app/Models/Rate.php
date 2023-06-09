<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_type_id', 
        'client_type_id', 
        'hotel_id', 
        'package_id', 
        'rate_value', 
        'other_fields'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function clientType()
    {
        return $this->belongsTo(ClientType::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
