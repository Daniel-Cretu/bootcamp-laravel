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
@endsection
