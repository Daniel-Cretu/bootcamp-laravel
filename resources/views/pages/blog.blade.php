@extends('layout')
@section('content')
    <div class="row">
        <div class="col-9">
            <div class="content-body">
                <div class="nav-scroller py-1 px-3 mb-2">
                    <nav class="nav d-flex justify-content-between">
                        <a class="p-3 link-secondary" href="#">Lifestyle</a>
                        <a class="p-3 link-secondary" href="#">Health</a>
                        <a class="p-3 link-secondary" href="#">Events</a>
                        <a class="p-3 link-secondary" href="#">Holidays</a>
                        <a class="p-3 link-secondary" href="#">Style</a>
                        <a class="p-3 link-secondary" href="#">Travel</a>
                    </nav>
                </div>
                <div class="row m-0 p-0">
                    {{ $articles->links() }}
                </div>
                <div class="row mx-4">
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
                                {{--                    <option value="" selected >Select author</option>--}}
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
                    <div class="col-md-auto py-2 px-0 px-xl-2">
                        <div class="col-12">
                            @include('../molecules.article', ['article' => $article])
                        </div>
                    </div>
                @endforeach
                <div class="row m-0 p-0">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('molecules.popular-articles')
        </div>
    </div>
@endsection
