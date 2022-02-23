@extends('layout')
@section('content')
    <div class="row m-0 p-0">
{{--        <div class="col-md-3">--}}
{{--            <div class="card d-flex flex-column align-items-center">--}}
{{--                <img src="..." class="card-img article-view-profile-img" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{$article->user->name}}</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
            <div class="card mb-3 pt-2">
                <img src="{{$article->image_url}}" class="card-img-top article-view-img" alt="...">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="card-title">{{$article->title}}</h1>
                        <h6 class="card-title">{{$article->user->name}}</h6>
                    </div>
                    <p class="card-text">{{$article->description}}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
{{--        </div>--}}
    </div>
    <h3 class="m-4">Comment section {{$article->comments()->count()}}</h3>
    @foreach($article->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$comment->author_email}}</h5>
                <p class="card-text">{{$comment->message}}</p>
                <p class="card-text"><small class="text-muted">{{ date('d-M-y', strtotime($comment->created_at)) }}</small></p>
            </div>
        </div>
    @endforeach
    <h3 class="m-4">Leave a comment</h3>
    <form class="row p-0 m-0 rounded overflow-hidden d-flex flex-row justify-content-center align-items-center mb-4 h-md-250 position-relative"
                    action="{{ route('article.comment', $article->id) }}"
          method="POST"  name="comment-form"
    >
        <div class="row p-0 m-0 py-2">
            <div class="col-12 form-floating">
                <textarea class="form-control" name="formCommentComment" placeholder="Leave a comment here" id="formCommentComment"></textarea>
                <label class="mx-2" for="formCommentComment">Comment</label>
            </div>
        </div>
        <div class="row p-0 m-0 py-2 d-flex justify-content-center">
{{--            <div class="col-8">--}}
                <div class="col-12 col-md-10 form-floating">
                    <input class="form-control" name="formCommentEmail" placeholder="Email address" id="formCommentEmail"/>
                    <label class="mx-2" for="formCommentEmail">Email address</label>
                </div>
{{--            </div>--}}
            <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                <button class="btn btn-lg btn-outline-secondary" type="submit">Comment</button>
            </div>
        </div>
        @csrf
    </form>
@endsection
