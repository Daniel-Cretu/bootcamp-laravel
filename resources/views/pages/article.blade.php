@extends('layout')
@section('content')
    <div class="h-100 px-4 pb-4 my-2 bg-light border rounded-3">
        <div class="row my-2">
            <a class="p-2 link-secondary col-auto" href="#">Lifestyle</a>
            <a class="p-2 link-secondary col-auto" href="#">Health</a>
            <a class="p-2 link-secondary col-auto" href="#">Events</a>
            <a class="p-2 link-secondary col-auto" href="#">Holidays</a>
            <a class="p-2 link-secondary col-auto" href="#">Style</a>
            <a class="p-2 link-secondary col-auto" href="#">Travel</a>
        </div>
        <h2>{{$article->title}}</h2>
        <h3>{{$article->user->name}}</h3>
        <div class="col-12 px-0">
            <p class="m-4 w-50">
                @include('../atoms.article-img', ['image' => $article->image])
            </p>
            <p class="lead my-3">{{$article->description}}</p>
        </div>
    </div>
    <h3 class="m-4">Leave a comment</h3>
    <form class="row g-0  rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
        <div class="col px-3 d-flex flex-column position-static">
            <div class="row my-3">
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" placeholder="Nickname" id="formCommentNickname"/>
                    <label class="mx-2"  for="formCommentNickname">Nickname</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" placeholder="Email address" id="formCommentEmail"/>
                    <label class="mx-2" for="formCommentEmail">Email address</label>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="formCommentComment"></textarea>
                <label for="formCommentComment">Comment</label>
            </div>
        </div>
    </form>
    <h3 class="m-4">Comment section {{$article->comments()->count()}}</h3>
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
    @foreach($article->comments as $comment)
{{--        @if($articleComment->article_id == $article->id)--}}
            @include('../molecules.comment', ['comment' => $comment])
{{--        @endif--}}
    @endforeach
@endsection
