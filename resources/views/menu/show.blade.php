@extends('layout')
@section('content')
    <h2>Pizza</h2>
    <div class="row p-0 m-0 d-flex flex-wrap">
        @foreach($products as $product)
            @if($product->category_id === 1)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        <div class="product card shadow-sm">
                            <div style="position:relative;">
                                <div class="d-flex flex-wrap flex-column justify-content-start product-warnings-container">
                                    @foreach($product->warnings as $warning)
                                        <img src="images/warnings/{{$warning->image_location}}"
                                             class="card-img-top product-warning"
                                             alt="Warning {{$warning->name}}" title="{{$warning->name}}"
                                        >
                                    @endforeach
                                </div>
                                <img src="{{asset('storage/' . $product->image_location)}}"
                                     class="product-img card-img-top" alt="{{$product->name}}"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary" title="Add product">
                                        <i class="bi bi-bag-plus"></i>
                                        <span class="mx-1">{{$product->price}}$</span>
                                    </a>
                                    <a href="#" class="btn btn-primary" title="Toppings">
                                        <i class="bi bi-list-ul"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
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
                        <div class="product card shadow-sm">
                            <div style="position:relative;">
                                <div class="d-flex flex-wrap flex-column justify-content-start product-warnings-container">
                                    @foreach($product->warnings as $warning)
                                        <img src="images/warnings/{{$warning->image_location}}"
                                             class="card-img-top product-warning"
                                             alt="Warning {{$warning->name}}" title="{{$warning->name}}"
                                        >
                                    @endforeach
                                </div>
                                <img src="{{asset('storage/' . $product->image_location)}}"
                                     class="product-img card-img-top" alt="{{$product->name}}"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary" title="Add product">
                                        <i class="bi bi-bag-plus"></i>
                                        <span class="mx-1">{{$product->price}}$</span>
                                    </a>
                                    <a href="#" class="btn btn-primary" title="Toppings">
                                        <i class="bi bi-list-ul"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
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
                        <div class="product card shadow-sm">
                            <div style="position:relative;">
                                <div class="d-flex flex-wrap flex-column justify-content-start product-warnings-container">
                                    @foreach($product->warnings as $warning)
                                        <img src="images/warnings/{{$warning->image_location}}"
                                             class="card-img-top product-warning"
                                             alt="Warning {{$warning->name}}" title="{{$warning->name}}"
                                        >
                                    @endforeach
                                </div>
                                <img src="{{asset('storage/' . $product->image_location)}}"
                                     class="product-img card-img-top" alt="{{$product->name}}"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary" title="Add product">
                                        <i class="bi bi-bag-plus"></i>
                                        <span class="mx-1">{{$product->price}}$</span>
                                    </a>
                                    <a href="#" class="btn btn-primary" title="Toppings">
                                        <i class="bi bi-list-ul"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
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
                        <div class="product card shadow-sm">
                            <div style="position:relative;">
                                <div class="d-flex flex-wrap flex-column justify-content-start product-warnings-container">
                                    @foreach($product->warnings as $warning)
                                        <img src="images/warnings/{{$warning->image_location}}"
                                             class="card-img-top product-warning"
                                             alt="Warning {{$warning->name}}" title="{{$warning->name}}"
                                        >
                                    @endforeach
                                </div>
                                <img src="{{asset('storage/' . $product->image_location)}}"
                                     class="product-img card-img-top" alt="{{$product->name}}"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary" title="Add product">
                                        <i class="bi bi-bag-plus"></i>
                                        <span class="mx-1">{{$product->price}}$</span>
                                    </a>
                                    <a href="#" class="btn btn-primary" title="Toppings">
                                        <i class="bi bi-list-ul"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
