<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productId)
    {
        if(Product::select('flag')->find($productId) === null || !(Product::select('flag')->find($productId)->flag === 1))
        {
            return redirect('/');
        }
        $product = Product::select('products.id', 'products.category_id', 'products.name', 'products.price', 'products_info.description', 'products_info.image_location')
            ->with('ProductInfo')->join('products_info', 'products_info.product_id', '=', 'products.id')->findOrFail($productId);
        return view('pages.product',['product' => $product]);
    }
}
