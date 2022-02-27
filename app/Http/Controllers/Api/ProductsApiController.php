<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class ProductsApiController
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

    public function getProducts()
    {
        $products = Product::select('id', 'name')
            ->with(['productInfo'])
            ->where('flag', '=' , '1')
            ->get();

        return $this->responseFactory->json($products);
    }

    public function orderProducts(Request $request)
    {
        $orderRequest = json_decode($request->getContent());

        $order = new Order();
        $totalPrice = 0;
        foreach ($orderRequest->products as $product){
            $productInfo = Product::find($product->id);
            $totalPrice += $productInfo->price * $product->quantity;
        }
        $order['status_id'] = 1;
        $order['price'] = $totalPrice;
        $order['phone_number'] = $orderRequest->phone_number;
        $order['address'] = $orderRequest->address;
        $order->save();

        foreach ($orderRequest->products as $product){
            $orderProduct = new OrderProduct();
            $orderProduct['order_id'] = $order->id;
            $orderProduct['product_id'] = $product->id;
            $orderProduct['quantity'] = $product->quantity;
            $orderProduct->save();
        }

        return $this->responseFactory->json($order->id, 201);
    }
}
