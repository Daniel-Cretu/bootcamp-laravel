@extends('layout')
@section('content')
    <div class="row m-0 p-0">
        <div class="col-9">
            <div class="content-body">
                <div class="nav-scroller py-1 px-3 mb-2">
                    <nav class="nav d-flex justify-content-start">
                        @foreach($categories as $category)
                            <a class="col-auto p-3 link-secondary" href="#" title="{{ $category->name }}">{{ $category->name }}</a>
                        @endforeach
                    </nav>
                </div>
{{--                <div class="m-0 p-0 d-flex justify-content-between">--}}
{{--                    <div class="col">--}}
{{--                        <a class="btn btn-primary" href="/blog/article/create">Create an article</a>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        {{ $articles->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row m-0 p-0">
                    <form method="GET" action="/blog" class="row p-0 m-0">
                        <div class="col-12">
                            <select class="form-select" name="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($filter['category'] === $category->id) selected @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="sort">
                                <option value="DESC" @if($filter['sort'] === 'DESC') selected @endif>DESC</option>
                                <option value="ASC" @if($filter['sort'] === 'ASC') selected @endif>ASC</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="author">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}"
                                            @if($filter['author'] === $author->id) selected @endif
                                    >{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" value="1" name="hasComments" id="hasComments"
                                   @if($filter['hasComments'] === 1) checked @endif
                            >
                            <label class="form-check-label" for="hasComments">
                                Has comments
                            </label>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary">Apply sort</button>
                        </div>
                    </form>
                </div>
                @foreach($articles as $article)
{{--                    <div class="col-md-auto py-2 px-0 px-xl-2">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="article p-0 py-1 p-lg-2 h-100 bg-light">--}}
{{--                                <div class="row m-0 p-0 py-1 text-decoration-none text-reset">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Lifestyle</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Health</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Events</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Holidays</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Style</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Travel</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Lifestyle</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Health</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Events</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Holidays</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Style</a>--}}
{{--                                        <a class="p-1 link-secondary col-auto" href="#">Travel</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a class="row m-0 p-0 text-decoration-none text-reset"--}}
{{--                                   href="{{route('article',['articleId' => $article->id])}}"--}}
{{--                                    href="..."--}}
{{--                                >--}}
{{--                                    <div class="col-12 col-lg-6">--}}
{{--                                        <div class="col-12 col-md-6 col-lg-4 px-0 py-0 w-100">--}}
{{--                                            <img src="{{$article->image_url}}" alt="Product" class="img-fluid  border rounded-3 w-100">--}}
{{--                                        </div>--}}
{{--                                        <h4 class="col-12 m-0 px-0 py-0 fst-italic">{{$article->title}}</h4>--}}
{{--                                        <div class="col-12 m-0 px-0 py-0">{{date('d-M-y', strtotime($article->published_at))}}</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-none d-lg-block col-12 col-lg-6 fs-3">{{$article->excerpt}}</div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <hr>--}}

{{--                    <div class="card">--}}
{{--                        <h5 class="card-header">Featured</h5>--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$article->title}}</h5>--}}
{{--                            <p class="card-text">{{$article->excerpt}}</p>--}}
{{--                            <a href="#" class="btn btn-primary">Continue reading...</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <hr>--}}

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
        <div class="col-3">
{{--            @include('molecules.popular-articles')--}}
        </div>
    </div>
@endsection
