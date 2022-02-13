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
        <h2 class="">{{$article->title}}</h2>
        <h6 class="fst-italic">{{$article->user->name}}</h6>
        <div class="col-12 px-0">
            <p class="p-0 img-fluid">
                @include('../atoms.article-img', ['image' => $article->image])
            </p>
            <p class="lead my-3">{{$article->description}}</p>
        </div>
    </div>
    <h3 class="m-4">Leave a comment</h3>
    <form class="row g-0  rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative"
          action="{{ route('comment.send', $article->id) }}" method="POST"  name="comment-form"
    >
        <div class="col px-3 d-flex flex-column position-static">
            <div class="row my-3">
                <div class="col-12 form-floating">
                    <input class="form-control" name="formCommentEmail" placeholder="Email address" id="formCommentEmail"/>
                    <label class="mx-2" for="formCommentEmail">Email address</label>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" name="formCommentComment" placeholder="Leave a comment here" id="formCommentComment"></textarea>
                <label for="formCommentComment">Comment</label>
            </div>
            <button class="btn btn-outline-secondary" type="submit">Comment</button>
        </div>
        @csrf
    </form>
    <h3 class="m-4">Comment section {{$article->comments()->count()}}</h3>
    @foreach($article->comments as $comment)
            @include('../molecules.comment', ['comment' => $comment])
    @endforeach
    <div class="row m-0 p-0">
        {{ $articleComments->links() }}
    </div>
@endsection
