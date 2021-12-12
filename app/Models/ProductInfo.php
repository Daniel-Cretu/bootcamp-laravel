<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description',
        'image_location',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    protected $table = 'products_info';
    public $timestamps = false;
}
