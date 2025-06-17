<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'image_path' , 'orders']; // Mass assignable fields

    // Define the relationship to the TvType model
    public function tvType()
    {
        return $this->belongsTo(TvType::class, 'type_id');
    }
}

