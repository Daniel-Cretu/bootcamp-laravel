<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    public function index() {
        $products = Product::with('ProductInfo')->get()->all();
        return view('pages.menu', ['products' => $products]);
    }
}
