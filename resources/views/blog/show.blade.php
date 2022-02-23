@extends('layout')
@section('content')
    <div class="row m-0 p-0">
        <div class="col-12 col-lg-9">
            <div class="content-body">
                <div class="py-1 px-3 mb-2">
                    {{--Mobile Nav--}}
                    <div class="d-block d-lg-none">
                        <a class="col-12 btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Show Categories
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="list-group">
                                @foreach($categories as $category)
                                    <a class="text-decoration-none @if($filter['category'] === $category->id) active @endif"
                                       href="{{route('blog.category', ['categoryId' => $category->id])}}"
                                       title="{{ $category->name }}"
                                    >
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-10 text-truncate">{{ $category->name }}</div>
                                            <div class="col-auto">
                                                <span class="badge bg-primary rounded-pill">{{ $category->article_count }}</span>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--Desktop nav--}}
                    <div class="d-none d-lg-block">
                        <div class="nav nav-tabs">
                            @foreach($categories as $category)
                            <div class="nav-item col-3 active">
                                <a class="nav-link @if($filter['category'] === $category->id) active @endif"
                                   href="{{route('blog.category', ['categoryId' => $category->id])}}"
                                   title="{{ $category->name }}"
                                >
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-10 text-truncate">{{ $category->name }}</div>
                                        <div class="col-auto">
                                            <span class="badge bg-primary rounded-pill">{{ $category->article_count }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach($articles as $article)
                    <div class="card mb-3 article shadow-sm">
                        <a href="{{route('article.show',['articleId' => $article->id])}}"  class="article-url">
                            <img src="{{$article->image_url}}" class="card-img-top article-img" alt="{{$article->title}}">
                        </a>
                        <div class="card-body">
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-secondary">Secondary</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->excerpt}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                @endforeach
                <div class="row m-0 p-0">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            {{--Implement top articles--}}
        </div>
    </div>
@endsection