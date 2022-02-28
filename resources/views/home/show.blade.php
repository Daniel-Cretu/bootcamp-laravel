@extends('layout')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide py-2 p-1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-3">
            <div class="carousel-item active">
                <img src="{{asset('./assets/img/index/caro-1.png')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">Great food</h5>
                    <p class="text-shadow">We offer amazing variety of food.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('./assets/img/index/caro-2.jpg')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">Amazing service</h5>
                    <p class="text-shadow">Top level service. Great personal.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('./assets/img/index/caro-3.jpeg')}}" class="d-block w-100 border rounded-3" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-shadow">Always on the phone</h5>
                    <p class="text-shadow">Order anywhere. Free delivery.</p>
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
    <div class="row p-0 m-0 d-flex flex-wrap ">
        @foreach($products as $product)
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
                        <img src="{{asset('storage/' . $product['image_location'])}}"
                             class="product-img card-img-top" alt="{{$product['name']}}"
                        >
                        <div class="card-body">
                            <h5 class="card-title">{{$product['name']}}</h5>
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row align-items-md-stretch m-0 p-0">
        <div class="col-12 col-lg-6">
            <div class="h-100 p-0 p-lg-5 bg-light rounded-3">
                <h2 class="display-3 fst-italic">Pizza Slice BLog</h2>
                <p class="fst-italic">Read about our latest and most relevant news!</p>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="h-100 p-0 p-lg-5 bg-light rounded-3">
                <img src="{{asset('./assets/img/cook.png')}}" class="d-block w-100 rounded-3" alt="...">
            </div>
        </div>
    </div>
    <div class="row mx-0 my-2">
        @foreach($topFiveCommentedArticles as $article)
            <div class="card mb-3 article shadow-sm">
                <a class="article-url" href="{{route('article.show', $article->id)}}">
                    <img src="{{$article->image_url}}" class="card-img-top article-img"
                         alt="{{$article->title}}"
                    >
                </a>
                <div class="card-body">
                    @foreach($article->blogTags as $blogTag)
                        <span class="badge bg-secondary">{{$blogTag->name}}</span>
                    @endforeach
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->excerpt}}</p>
                    <p class="card-text"><small class="text-muted">{{$article->published_at}}</small></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
