<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'hotel_id',
        'name',
        'price_per_night',
        'adult_price',
        'children_price',
        'total_rooms',
        'breakfast_price',
        'size',
        'bed_type',
        'description',
        'status_id',
        'image_path',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}
