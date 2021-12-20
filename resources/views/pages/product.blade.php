@extends('layout')
@section('content')
    <div class="mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <h1 class="m-4"></h1>
{{--            <h6>{{$product[0]}}</h6>--}}
            <div class="row">
                <div class="col-12 col-lg-6">
{{--                    @include('../atoms.product-img',['productImageLocation' => $product->image_location])--}}
                </div>
                <div class="col-12 col-lg-6">
                    <button class="btn my-3 m-lg-0 col-12 btn-outline-secondary btn-lg" type="button">Add</button>
                    <div class="row p-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolore earum ex perferendis reprehenderit. Aliquid aperiam atque culpa cupiditate debitis dolor dolorem dolores eius eos eveniet excepturi facilis impedit inventore ipsam molestiae nobis non officia perspiciatis quam quasi quidem reiciendis repellendus suscipit, tempore ullam? Animi architecto dicta doloribus error nisi?
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-0 m-0 d-flex flex-wrap ">
        <h3 class="my-4">Toppings</h3>
        @for ($i = 0; $i < 4; $i++)
                <div class="row my-2 align-items-center justify-content-between">
                    <div class="col-12 col-lg-8 my-2 my-lg-0 text-center text-lg-start">Topping {{$i+1}}</div>
                    <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class="btn btn-warning text-light topping-add-rm">-</div>
                        <div class="mx-5">2</div>
                        <div class="btn btn-warning text-light topping-add-rm">+</div>
                    </div>
                </div>
        @endfor
    </div>
@endsection
