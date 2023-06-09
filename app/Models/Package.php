<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'itinerary',
        'number_of_quoters',
        'days',
        'start_time',
        'end_time',
        'status',
        'package_type_id',
        'sale_id',
        'product_id',
        'activity_id',
        'entertainment_id',
        'room_type_id',
    ];

    // Define the relationships with other models

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function activities()
    {
    return $this->belongsToMany(Activity::class);
    }

    public function entertainment()
    {
        return $this->belongsTo(Entertainment::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    // Add more relationships as needed

}
