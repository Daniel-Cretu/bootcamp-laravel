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
        <h2>Article title</h2>
        <div class="col-12 px-0">
            <p class="float-start m-4 w-50">
                @include('../atoms.product-img')
            </p>
            <p class="lead my-3">

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque viverra vestibulum aliquam. Donec eget leo quam. Etiam gravida, dolor ut tincidunt dignissim, nunc tellus interdum risus, non venenatis ante purus eget sem. Quisque purus tellus, hendrerit volutpat libero et, facilisis aliquam elit. Curabitur viverra ex quis diam pulvinar euismod. Mauris dictum magna sed augue dictum, euismod mollis tortor congue. In hac habitasse platea dictumst. Pellentesque consectetur tempor sollicitudin. Suspendisse potenti. Vestibulum tincidunt consequat diam ut rhoncus. In finibus gravida volutpat. Suspendisse vestibulum laoreet ante sed laoreet. Vivamus enim augue, cursus nec faucibus at, volutpat at tellus. Proin pretium, lacus eu dignissim iaculis, lorem purus laoreet ligula, non dictum neque neque sed augue. Etiam eu augue diam. Nulla facilisi.

                Donec hendrerit erat et ipsum maximus fringilla. Nam non volutpat ex, sit amet placerat eros. Curabitur justo justo, sodales quis sem in, lobortis porttitor arcu. Vivamus lobortis non tellus condimentum consequat. Duis porta mauris elit, quis convallis dui sodales non. Praesent semper, dolor pulvinar efficitur mattis, ipsum ligula auctor nibh, quis imperdiet elit urna at mauris. Sed vel placerat elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus auctor lobortis justo, eu maximus felis finibus at. Nullam eleifend metus leo, at egestas sapien blandit id. Pellentesque dapibus porta mattis. Donec non fermentum nulla. Etiam varius urna in dolor eleifend interdum. In sit amet orci porttitor, faucibus turpis nec, gravida orci. Curabitur fringilla sed ligula nec semper. Suspendisse mollis magna in orci egestas, eget dictum mi fringilla.

                Mauris tempus lorem ante, quis luctus sem facilisis in. In tempus augue sit amet finibus commodo. Nulla id nunc id dui pellentesque facilisis ac vel nibh. Ut vitae porta velit. Donec condimentum dui at dictum luctus. Integer sodales, dui vel mollis imperdiet, neque magna tincidunt dui, vitae laoreet justo justo et felis. Donec et mauris at nisl tempus condimentum. Nunc ornare velit nisl, quis elementum felis feugiat ac. Nullam eros arcu, sodales sit amet lorem et, aliquam efficitur tortor. Nam lobortis dignissim odio quis efficitur.

                In felis odio, sollicitudin ut sollicitudin non, vestibulum ac justo. Phasellus nisl tortor, condimentum vitae eleifend ut, luctus vitae odio. Proin cursus nisi a eros fermentum tincidunt. Integer egestas neque nec sem vestibulum tempus. Suspendisse egestas massa vitae tempus auctor. Aliquam vitae neque velit. Donec at lectus sem. Aenean at lectus consequat, gravida elit nec, rutrum mi. Mauris leo leo, sodales tempor feugiat eget, malesuada sit amet velit.

                Donec id gravida turpis. In dui augue, auctor a lacus sed, ultrices pretium ipsum. Curabitur accumsan augue sed dui viverra faucibus. Maecenas elit orci, lobortis eget justo vitae, consequat fringilla neque. Nunc non euismod nisl. Nulla facilisi. Integer mollis quis nisi at finibus. Aliquam semper tortor in bibendum euismod. Phasellus sodales consectetur sodales. Mauris in bibendum tortor, at ornare tortor. Proin sapien nibh, cursus vel dui sit amet, maximus elementum ante. Donec at ultricies arcu, in dapibus leo. Pellentesque mollis eros laoreet elit dapibus, sed egestas leo interdum. Etiam auctor volutpat lacus, in vehicula erat vehicula vitae. Sed risus quam, bibendum vel ullamcorper vel, finibus in lorem. Vivamus suscipit leo eget sem viverra, id viverra quam sollicitudin. </p>
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
    <h3 class="m-4">Comment section</h3>
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
{{--    @include('../molecules.comment')--}}
    @foreach($articleComments as $articleComment)
        @if($articleComment->article_id == $articleId)
            @include('../molecules.comment', ['articleComment' => $articleComment])
        @endif
    @endforeach
@endsection
