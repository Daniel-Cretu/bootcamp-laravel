<div class="h-100 px-4 pb-4 bg-light border rounded-3">
    <div class="row my-2">
        <a class="p-2 link-secondary col-auto" href="#">Lifestyle</a>
        <a class="p-2 link-secondary col-auto" href="#">Health</a>
        <a class="p-2 link-secondary col-auto" href="#">Events</a>
        <a class="p-2 link-secondary col-auto" href="#">Holidays</a>
        <a class="p-2 link-secondary col-auto" href="#">Style</a>
        <a class="p-2 link-secondary col-auto" href="#">Travel</a>
    </div>
    <div class="row">
        <h2>{{$article->title}}</h2>
        <div>
            <p class="float-start m-4 ms-0 w-25">
                @include('../atoms.product-img', ['image' => $article->image])
            </p>
            <p class="lead">{{$article->excerpt}}</p>
        </div>
    </div>
    <a class="col-12 col-xl-6 btn btn-outline-secondary" type="button" href="{{route('article')}}">Continue reading ...</a>
</div>
