<div class="row p-2 p-md-3 mb-2 text-white rounded bg-dark">
    <div class="col-md-8 px-0">
        <h1 class="display-6 fst-italic">{{$article->title}}</h1>
        <p class="lead my-3">{{$article->excert}}</p>
        <p class="lead mb-0"><a href="article.blade.php" class="text-white fw-bold">Continue reading...</a></p>
        <strong class="d-inline-block m-2 text-warning">Lifestyle</strong>
        <strong class="d-inline-block m-2 text-warning">Health</strong>
    </div>
    <div class="col-md-4 px-0">
        <img src="{{$article->image}}" class="card-img" alt="{{$article->title}}" />
    </div>
</div>
