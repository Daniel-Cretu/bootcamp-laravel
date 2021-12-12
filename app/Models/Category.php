<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function product() {

        return $this->hasMany(Product::class);

        return $this->belongsTo(Product::class);
    }

    public $timestamps = false;
}
