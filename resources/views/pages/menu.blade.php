@extends('layout')
@section('content')
    <h2>Pizza</h2>
    <div class="row p-0 m-0 d-flex flex-wrap">
        @foreach($products as $product)
            @if($product->category_id === 1)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        @include('../molecules.product',['product' => $product])
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <h2>Meat & Fish</h2>
    <div class="row p-0 m-0 d-flex flex-wrap">
        @foreach($products as $product)
            @if($product->category_id === 2)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        @include('../molecules.product',['product' => $product])
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <h2>Vegetarian</h2>
    <div class="row p-0 m-0 d-flex flex-wrap">
        @foreach($products as $product)
            @if($product->category_id === 3)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        @include('../molecules.product',['product' => $product])
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <h2>Salad</h2>
    <div class="row p-0 m-0 d-flex flex-wrap">
        @foreach($products as $product)
            @if($product->category_id === 4)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        @include('../molecules.product',['product' => $product])
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
