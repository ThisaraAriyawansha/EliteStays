<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'breakfast',
        'checkin',
        'checkout',
        'adults',
        'children',
        'rooms',
        'total_price',
        'billing_name',
        'email',
        'phone',
        'passport_number',
        'address',
        'country',
        'city_state',
        'postal_code',
        'special_notes',
        'status_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function status()
    {
        return $this->belongsTo(BookingStatus::class, 'status_id');
    }


}