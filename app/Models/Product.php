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
    public function warnings() {
        return $this->belongsToMany(Warning::class);
    }
    public function orderProducts() {
        return $this->hasMany(OrderProduct::class);
    }
    public function orderProductToppings()
    {
        return $this->hasMany(OrderProductTopping::class);
    }

    public $timestamps = false;
}
