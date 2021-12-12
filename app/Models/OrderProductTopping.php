<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductTopping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_product_id',
        'product_id',
        'quantity',
    ];

    public function orderProduct() {
        return $this->belongsTo(OrderProduct::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public $timestamps = false;
}
