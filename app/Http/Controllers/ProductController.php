<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ModelLogger;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productId, Request $request, ModelLogger $logger)
    {
        $product = Product::with('ProductInfo')->findOrFail($productId);

        $logger->logModel($request->user(), $product);

        return view('pages.product',['product' => $product]);
    }
}
