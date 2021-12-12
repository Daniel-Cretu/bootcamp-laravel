<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWarning extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warning_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function warning()
    {
        return $this->belongsTo(Warning::class);
    }

    protected $table = 'product_warning';
    public $timestamps = false;
}
