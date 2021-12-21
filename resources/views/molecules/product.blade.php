<div class="product bg-light">
    <a href="{{route('product',['productId' => $product->id])}}" class="link-light">
        @include('../atoms.product-img',['productImageLocation' => $product->image_location])
        <h4 class="title text-shadow">{{$product->name}}</h4>
        <h4 class="price text-shadow">{{$product->price}} lei</h4>
    </a>
</div>
