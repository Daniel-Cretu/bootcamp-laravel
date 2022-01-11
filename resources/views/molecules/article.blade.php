<div class="article p-0 py-1 p-lg-2 h-100 bg-light">
{{--    <div class="row m-0 p-0 px-3 p-lg-3">--}}
    <div class="row m-0 p-0 py-1 text-decoration-none text-reset">
        <div class="col-12">
            <a class="p-1 link-secondary col-auto" href="#">Lifestyle</a>
            <a class="p-1 link-secondary col-auto" href="#">Health</a>
            <a class="p-1 link-secondary col-auto" href="#">Events</a>
            <a class="p-1 link-secondary col-auto" href="#">Holidays</a>
            <a class="p-1 link-secondary col-auto" href="#">Style</a>
            <a class="p-1 link-secondary col-auto" href="#">Travel</a>
            <a class="p-1 link-secondary col-auto" href="#">Lifestyle</a>
            <a class="p-1 link-secondary col-auto" href="#">Health</a>
            <a class="p-1 link-secondary col-auto" href="#">Events</a>
            <a class="p-1 link-secondary col-auto" href="#">Holidays</a>
            <a class="p-1 link-secondary col-auto" href="#">Style</a>
            <a class="p-1 link-secondary col-auto" href="#">Travel</a>
        </div>
    </div>
    <a class="row m-0 p-0 text-decoration-none text-reset" href="{{route('article',['articleId' => $article->id])}}">
        <div class="col-12 col-lg-6">
            <div class="col-12 col-md-6 col-lg-4 px-0 py-0 w-100">
                @include('../atoms.article-img', ['image' => $article->image])
            </div>
            <h4 class="col-12 m-0 px-0 py-0 fst-italic">{{$article->title}}</h4>
            <div class="col-12 m-0 px-0 py-0">{{date('d-M-y', strtotime($article->published_at))}}</div>
        </div>
        <div class="d-none d-lg-block col-12 col-lg-6 fs-3">{{$article->excerpt}}</div>
    </a>
{{--    <a class="col-12 col-xl-6 btn btn-outline-secondary" type="button" href="{{route('article',['articleId' => $article->id])}}">Continue reading ...</a>--}}
</div>
