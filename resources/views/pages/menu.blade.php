@extends('layout')
@section('content')
    <div class="row p-0 m-0 d-flex flex-wrap ">
        @foreach($products as $product)
            <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                <div class="col-12 col-lg-11 ">
                    @include('../molecules.product',['product' => $product])
                </div>
            </div>
        @endforeach
    </div>
@endsection
