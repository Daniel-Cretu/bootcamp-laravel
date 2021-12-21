<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productId)
    {
//        $product = productRepository->find
//        $productRepository = $this->enti
//        $productName = Product::select('name')->where('id',$productId)->get()->all();
//        $product = Product::where('id',$productId)->get()->all();
        $product = Product::with('ProductInfo')->where('id',$productId)->get()->all();
        return view('pages.product',['product' => $product]);
    }
}
