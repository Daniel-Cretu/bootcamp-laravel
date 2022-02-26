<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\ResponseFactory;

class CartController
{
    /** @var ResponseFactory */
    private $responseFactory;

    /**
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }
//    public function show() {
//        return view('cart.show');
//    }

    public function getProducts()
    {
        $products = Product::select('id', 'name')
            ->with(['productInfo'])
            ->where('flag', '=' , '1')
            ->get();

//        $categories = Category::has('products')
//            ->with(['products' => function ($query) {
//                $query->with(['productInfo'])
//                    ->with(['warnings'])
//                    ->where('flag', '=' , '1')
//                ;
//            }])
//            ->get();

        return $this->responseFactory->json($products);
    }
}
