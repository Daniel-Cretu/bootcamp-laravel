<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    public function index() {
        $products = Product::select('products.id', 'products.name', 'products.price', 'products.category_id', 'products_info.image_location')
            ->join('products_info', 'products_info.product_id', '=', 'products.id')
            ->where('products.flag', '1')
            ->orderby('name', 'ASC')
            ->get();
        return view('pages.menu', ['products' => $products]);
    }
}
