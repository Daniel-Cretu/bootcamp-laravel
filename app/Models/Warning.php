<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_location',
    ];

    public $timestamps = false;
}
