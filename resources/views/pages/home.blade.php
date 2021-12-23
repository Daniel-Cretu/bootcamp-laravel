@extends('layout')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide py-2 " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-3">
            <div class="carousel-item active">
                <img src="{{asset('./assets/img/index/caro-1.png')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">First slide label</h5>
                    <p class="text-shadow">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('./assets/img/index/caro-2.jpg')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">Second slide label</h5>
                    <p class="text-shadow">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('./assets/img/index/caro-3.jpeg')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">Third slide label</h5>
                    <p class="text-shadow">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <hr/>












    <div class="row p-0 m-0 d-flex flex-wrap ">
        @foreach($products as $product)
            <div class="col-12 col-lg-6 col-xl-3 my-2 p-0 d-flex justify-content-center">
                <div class="col-12 col-lg-11 ">
                    @include('../molecules.product',['product' => $product])
                </div>
            </div>
        @endforeach
    </div>
    <hr/>







    <div class="row mx-0 my-2">
        @foreach($articles as $article)
            <div class="col-md-auto py-2 px-0 px-xl-2">
                <div class="col-12">
                    <?php dump($article); ?>
                    @include('../molecules.article', ['article' => $article])
                </div>
            </div>
        @endforeach
    </div>
    <hr/>
@endsection
