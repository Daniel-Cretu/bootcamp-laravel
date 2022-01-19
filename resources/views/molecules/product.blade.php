<div class="product bg-light h-100 d-flex flex-column justify-content-between my-xl-3">
    <div class="product-info" data-bs-toggle="modal" data-bs-target="#modal-{{$product->id}}">
        @include('../atoms.product-img',['productImageLocation' => $product->image_location])
        <h4 class="title px-2">{{$product->name}}</h4>
    </div>
    <div class="d-flex flex-row justify-content-between align-middle px-2">
        <h4 class="price my-auto">{{$product->price}} lei</h4>
        <form action="{{ route('product.add', $product->id) }}" method="POST"  name="add-product-form">
            <button class="btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="cart bi bi-cart-plus" viewBox="0 0 16 16">
                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
            </button>
            @csrf
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg m-auto">
        <form class="modal-content"
              action="{{ route('product.add', $product->id) }}" method="POST"  name="add-product-form"
        >
            <div class="modal-header">
                <h5 class="modal-title" id="product-name-{{$product->id}}}">{{$product->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="mb-4 rounded-3">
                <div class="container-fluid">
                    <h1 class="m-4"></h1>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            @include('../atoms.product-img',['productImageLocation' => $product->image_location])
                        </div>
                        <div class="col-12 col-lg-6">
                            <h3 class="my-2">Toppings</h3>
                            @for ($i = 0; $i < 4; $i++)
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="topping-{{$product->id}}}-{{$i+1}}">
                                    <label class="form-check-label text-break" for="topping-{{$product->id}}}-{{$i+1}}">Topping {{$i+1}}</label>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn m-3 btn-outline-secondary btn-lg" type="submit">Add</button>
            @csrf
        </form>
    </div>
</div>
