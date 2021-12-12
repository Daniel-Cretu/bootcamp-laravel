<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productInfo(){
        return $this->hasOne(ProductInfo::class);
    }
    public function productWarning() {
        return $this->hasMany(ProductWarning::class);
    }
    public function orderProduct() {
        return $this->hasMany(OrderProduct::class);
    }
    public function orderProductTopping() {
        return $this->hasMany(OrderProductTopping::class);
    }

    public $timestamps = false;
}
