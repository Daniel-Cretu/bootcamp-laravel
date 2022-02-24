@extends('layout')
@section('content')
    <div class="row m-0 p-0">
        <div class="col-12 col-lg-9">
            <div class="content-body">
                <div class="py-1 px-3 mb-2">
                    {{--Mobile Navigation--}}
                    <div class="d-block d-lg-none">
                        <a class="col-12 btn btn-primary" data-bs-toggle="collapse"
                           href="#collapseExample" role="button" aria-expanded="false"
                           aria-controls="collapseExample"
                        >Show Categories</a>
                        <div class="collapse" id="collapseExample">
                            <div class="list-group">
                                @foreach($categories as $category)
                                    <a class="text-decoration-none @if($filter['category'] === $category->id) active @endif"
                                       href="{{route('blog', ['categoryId' => $category->id])}}"
                                       title="{{ $category->name }}"
                                    >
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-10 text-truncate">{{ $category->name }}</div>
                                            <div class="col-auto">
                                                <span class="badge bg-primary rounded-pill"
                                                >{{ $category->article_count }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--Desktop navigation--}}
                    <div class="d-none d-lg-block">
                        <div class="nav nav-tabs">
                            @foreach($categories as $category)
                            <div class="nav-item col-3 active">
                                <a class="nav-link @if($filter['category'] === $category->id) active @endif"
                                   href="{{route('blog', ['categoryId' => $category->id])}}"
                                   title="{{ $category->name }}"
                                >
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-10 text-truncate">{{ $category->name }}</div>
                                        <div class="col-auto">
                                            <span class="badge bg-primary rounded-pill"
                                            >{{ $category->article_count }}</span>
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
                        <a class="article-url">
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
                <div class="row m-0 p-0">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <section id="popular-articles">
                <h2 class="text-center">Most popular</h2>

                <ul class="list-group list">
                    @foreach($topFiveCommentedArticles as $article)
                        <li class="card mb-2 mx-1" title="{{$article->title}}">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                <i class="bi bi-chat-dots">{{$article->comments_count}}</i>
                            </span>
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{$article->image_url}}"
                                         class="rounded-start most-popular-article-img img-fluid" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text text-truncate">{{$article->title}}</p>
                                        <p class="card-text">
                                            <small class="text-muted">{{$article->published_at}}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
@endsection
