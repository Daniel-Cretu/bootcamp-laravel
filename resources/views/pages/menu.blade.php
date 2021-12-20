@extends('layout')
@section('content')
        <div class="row p-0 m-0 d-flex flex-wrap ">
            @for ($i = 0; $i < 4; $i++)
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        @include('../molecules.product')
                    </div>
                </div>
            @endfor
                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        <div class="product h-100 bg-light border rounded-3">
                            <a href="" class="link-light">
                                <img src="{{asset('./assets/img/index/caro-3.jpeg')}}" alt="Product" class="img-fluid   border rounded-3">
                                <h4 class="title text-shadow">Product product product</h4>
                                <h4 class="price text-shadow">50 lei</h4>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-2 p-0 d-flex justify-content-center">
                    <div class="col-12 col-lg-11 ">
                        <div class="product h-100 bg-light border rounded-3">
                            <a href="" class="link-light">
                                <img src="{{asset('./assets/img/menu/drink1.jpg')}}" alt="Product" class="img-fluid  border rounded-3">
                                <h4 class="title text-shadow">Product product product</h4>
                                <h4 class="price text-shadow">50 lei</h4>
                            </a>
                        </div>

                    </div>
                </div>
        </div>
@endsection
