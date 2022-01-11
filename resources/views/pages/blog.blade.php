@extends('layout')
@section('content')
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
        <form method="GET" action="/blog" class="row row-cols-3 p-0 m-0">
            <div class="col">
                <select class="form-select" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($filter['category'] === $category->id) selected @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-select" name="sort">
                    <option value="DESC" @if($filter['sort'] === 'DESC') selected @endif>DESC</option>
                    <option value="ASC" @if($filter['sort'] === 'ASC') selected @endif>ASC</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-primary">Apply sort</button>
            </div>
        </form>
    </div>
{{--    @for ($i = 0; $i < 10; $i++)--}}
{{--        <div class="col-md-auto py-2 px-0 px-xl-2">--}}
{{--            <div class="col-12">--}}
{{--                @include('../molecules.article')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endfor--}}

    @foreach($articles as $article)
{{--            @for ($i = 0; $i < 10; $i++)--}}
                <div class="col-md-auto py-2 px-0 px-xl-2">
                    <div class="col-12">
                        @include('../molecules.article', ['article' => $article])
                    </div>
                </div>
{{--            @endfor--}}
    @endforeach
    <div class="row m-0 p-0">
        {{ $articles->links() }}
    </div>
@endsection
