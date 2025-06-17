<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'username', 'password', 'email', 'status_id','image_path',
        'first_name', 'last_name', 'mobile', 'dob', 'gender', 'about'
    ];

    protected $hidden = ['password'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}