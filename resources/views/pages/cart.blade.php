@extends('layout')
@section('content')
    <div class="row m-0 my-4 rounded border">
        <div class="col-12 col-lg-8 border-end">
            <div class="d-flex flex-column flex-lg-row justify-content-between">
                <h4 class="m-2">Shopping Cart</h4>
                <h4 class="m-2">3 items</h4>
            </div>
            <hr>
            <div class="pb-3">
                @include('../organisms.cart-product')
                @include('../organisms.cart-product')
                @include('../organisms.cart-product')
                @include('../organisms.cart-product')
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-center">
                <h4 class="m-2">Summary</h4>
            </div>
            <hr>
            <div>
                <button class="col-12 col-xl-6 btn btn-outline-secondary w-100" type="submit" href="{{route('home')}}">Buy</button>
            </div>
        </div>
    </div>
    @endsection
