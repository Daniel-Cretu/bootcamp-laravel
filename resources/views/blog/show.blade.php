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
                            <h5 class="card-title d-flex justify-content-start">
                                @auth
                                    <a href="{{route('admin.article.edit', [$article->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square me-2" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                @endauth
                                {{$article->title}}
                            </h5>
                            <p class="card-text">{{$article->excerpt}}</p>
                            <p class="card-text"><small class="text-muted">{{$article->updated_at}}</small></p>
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

                            <a class="row m-0 p-0 g-0 text-decoration-none" href="{{route('article.show', $article->id)}}">
                                <div class="col-md-4 position-relative">
                                    <img src="{{$article->image_url}}"
                                         class="rounded-start most-popular-article-img img-fluid" alt="">
                                    <span class="article-comments translate-middle badge rounded-pill bg-primary">
                                        <i class="bi bi-chat-dots">{{$article->comments_count}}</i>
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text text-truncate">{{$article->title}}</p>
                                        <p class="card-text">
                                            <small class="text-muted">{{$article->updated_at}}</small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
@endsection
