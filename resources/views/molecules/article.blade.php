<div class="article p-1 p-lg-2 h-100 bg-light border rounded-3">
    <div class="row m-0 p-1 p-lg-3">
        <a class="p-2 link-secondary col-auto" href="#">Lifestyle</a>
        <a class="p-2 link-secondary col-auto" href="#">Health</a>
        <a class="p-2 link-secondary col-auto" href="#">Events</a>
        <a class="p-2 link-secondary col-auto" href="#">Holidays</a>
        <a class="p-2 link-secondary col-auto" href="#">Style</a>
        <a class="p-2 link-secondary col-auto" href="#">Travel</a>
    </div>
    <div class="row m-0 p-0">
        <h6 class="col-12 m-0 px-3 px-lg-4 py-0">{{date('d-M-y', strtotime($article->published_at))}}</h6>
        <h2 class="col-12 m-0 px-3 px-lg-4 py-0 fst-italic">{{$article->title}}</h2>
            <p class="col-12 col-md-6 col-lg-4 px-3 px-lg-4 py-2">
                @include('../atoms.article-img', ['image' => $article->image])
            </p>
            <p class="col-12 col-md-6 col-lg-8 px-3 px-lg-4 py-2">{{$article->excerpt}}</p>
    </div>
    <a class="col-12 col-xl-6 btn btn-outline-secondary" type="button" href="{{route('article',['articleId' => $article->id])}}">Continue reading ...</a>
</div>
