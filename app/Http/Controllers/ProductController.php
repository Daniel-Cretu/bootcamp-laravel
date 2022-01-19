<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ModelLogger;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productId)
    {
        $product = Product::with('ProductInfo')->where('id',$productId)->get()->all();
        return view('pages.product',['product' => $product]);
    }

    public function getProduct($productId)
    {
        return Product::with('ProductInfo')->findOrFail($productId);
    }

    public function addProduct($productId,Request $request, ModelLogger $logger)
    {
        $product = Product::with('ProductInfo')->findOrFail($productId);
        $logger->logModel($request->user(), $product);

        // Implement order functionality

        return back();
    }
}
