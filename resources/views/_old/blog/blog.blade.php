@extends('layout')
@section('content')
    <main id="content" class="p-3 flex-grow-1">
        <div class="nav-scroller py-1 px-3 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="#">Lifestyle</a>
                <a class="p-2 link-secondary" href="#">Health</a>
                <a class="p-2 link-secondary" href="#">Events</a>
                <a class="p-2 link-secondary" href="#">Holidays</a>
                <a class="p-2 link-secondary" href="#">Style</a>
                <a class="p-2 link-secondary" href="#">Travel</a>
            </nav>
        </div>
        @foreach($articles as $article)
            <div>
                @include('blog.article', ['article' => $article])
            </div>
        @endforeach
    </main>
@endsection
