<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvType extends Model
{
    use HasFactory;

    protected $table = 'tv_types'; // Define table name

    protected $fillable = ['name']; // Mass assignable fields
}
