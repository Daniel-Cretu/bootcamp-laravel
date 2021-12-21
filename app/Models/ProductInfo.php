<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description',
        'image_location',
    ];

//    public function getImageUrlAttribute(){
//        return Storage::url($this->image_location);
//    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $table = 'products_info';
    public $timestamps = false;
}
