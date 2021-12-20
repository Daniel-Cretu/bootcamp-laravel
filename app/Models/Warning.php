<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_location',
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public $timestamps = false;
}
