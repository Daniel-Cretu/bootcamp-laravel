{{--@if(isset($image))--}}
{{--    <img src="{{asset('storage/'.$image)}}" alt="Product" class="img-fluid  border rounded-3">--}}
{{--@else--}}
{{--    <img src="{{asset('storage/0adca39a30173f4dca12b77280b32a8b.png')}}" alt="Product" class="img-fluid  border rounded-3">--}}
{{--@endif--}}
<img src="{{$article->image_url}}" alt="Product" class="img-fluid  border rounded-3 w-100">
