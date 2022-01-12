<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    public function index() {
        $products = Product::select(['id', 'name', 'category_id', 'price'])
            ->where('flag', '1')
            ->orderby('name', 'ASC')
            ->get();
        return view('pages.menu', ['products' => $products]);
    }
}
