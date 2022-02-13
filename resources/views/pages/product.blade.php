@extends('layout')
@section('content')
    <div class="mb-4 bg-light rounded-3">
        <div>
            <h1 class="m-4"></h1>
            <h2>{{$product->name}}</h2>
            <div class="row">
                <div class="col-12 col-lg-6 text-center">
                    @include('../atoms.product-img',['productImageLocation' => $product->image_location])
                    <button class="btn my-3 col-12 btn-outline-secondary btn-lg" type="button">Add</button>
                </div>
                <div class="col-12 col-lg-6">
                    <h3 class="my-4">Description</h3>
                    <div class="row p-3">{{$product->description}}</div>
                </div>
            </div>
        </div>
        <div class="col-12 row text-center">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-auto my-1">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined{{$i}}" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btn-check-outlined{{$i}}">Topping {{$i}}</label><br>
                </div>
            @endfor
        </div>
    </div>
@endsection
