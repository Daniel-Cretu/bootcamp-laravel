@extends('layout')
@section('content')
@foreach($categories as $category)
    @if(count($category['products']))
        <h2>{{$category['name']}}</h2>
        <div class="row p-0 m-0 d-flex flex-wrap">

            @foreach($category['products'] as $product)
                    <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                        <div class="col-12 col-lg-11 ">
                            <div id="product-{{$product['id']}}" class="product card shadow-sm">
                                <div class="d-flex flex-wrap flex-column justify-content-start product-warnings-container">
                                    @foreach($product['warnings'] as $warning)
                                        <img src="images/warnings/{{$warning['image_location']}}"
                                             class="card-img-top product-warning"
                                             alt="Warning {{$warning['name']}}" title="{{$warning['name']}}"
                                        >
                                    @endforeach
                                </div>
                                <img src="@if($product['product_info']){{asset('storage/' . $product['product_info']['image_location'])}} @endif"
                                     class="product-img card-img-top" alt="{{$product['name']}}"
                                >
                                <div class="card-body">
                                    <h5 class="card-title">{{$product['name']}}</h5>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary" title="Add product" onclick="addProduct({{$product['id']}}, {{json_encode($product)}})">
                                            <i class="bi bi-bag-plus"></i>
                                            <span class="mx-1">{{$product['price']}}$</span>
                                        </button>
                                        <a href="#" class="btn btn-primary" title="Toppings">
                                            <i class="bi bi-list-ul"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    @endif
@endforeach
@endsection
