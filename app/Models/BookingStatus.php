<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    // Explicitly define the table name
    protected $table = 'booking_statuses';

    // Allow mass assignment for the 'name' column
    protected $fillable = ['name'];

    // Relationship: One BookingStatus has many Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'status_id');
    }
}
