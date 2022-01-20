<img
    @if(isset($productImageLocation))
        src="{{asset('storage/' . $productImageLocation)}}"
    @else
        src="/assets/img/no-img.jpg"
    @endif
    alt="Product"
    class="img-fluid  border rounded-3"
>
