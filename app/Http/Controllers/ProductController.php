<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ModelLogger;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productId, Request $request, ModelLogger $logger)
    {
        if(Product::select('flag')->find($productId) === null || !(Product::select('flag')->find($productId)->flag === 1))
        {
            return redirect('/');
        }
        $product = Product::select('products.id', 'products.category_id', 'products.name', 'products.price', 'products_info.description', 'products_info.image_location')
            ->with('ProductInfo')->join('products_info', 'products_info.product_id', '=', 'products.id')->findOrFail($productId);

        $logger->logModel($request->user(), $product);

        return view('pages.product',['product' => $product]);
    }

    public function addProduct($productId,Request $request, ModelLogger $logger)
    {
        $product = Product::with('ProductInfo')->findOrFail($productId);
        $logger->logModel($request->user(), $product);

        // Implement order functionality

        return back();
    }
}
