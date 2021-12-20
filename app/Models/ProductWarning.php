<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWarning
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warning_id',
    ];

    protected $table = 'product_warning';
    public $timestamps = false;
}
