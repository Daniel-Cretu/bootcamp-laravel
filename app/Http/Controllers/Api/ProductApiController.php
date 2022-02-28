<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\Warning;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class ProductApiController
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

    /**
     * Creates new product from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function productCreate(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'description' => ['required', 'string', 'min:10'],
            'category' => 'required|numeric',
            'price' => 'required',
            'image' => 'image'
        ]);

        $product = Product::create([
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'flag' => 1,
        ]);

        ProductInfo::create([
            'product_id' => $product->id,
            'description' => $request->input('description'),
            'image_location' => $request->file('image')->store('/', 'public'),

        ]);

        foreach (explode(',',$request->input('warnings')) as $warning){
            $product->warnings()->attach(Warning::find($warning));
        }


        return $this->responseFactory->json(['id' => $product->id], 201);
    }

    public function getProducts(): JsonResponse
    {
        $products = Product::select('id', 'name')
            ->with(['productInfo'])
            ->where('flag', '=' , '1')
            ->get();

        return $this->responseFactory->json($products);
    }

    public function orderProducts(Request $request): JsonResponse
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
