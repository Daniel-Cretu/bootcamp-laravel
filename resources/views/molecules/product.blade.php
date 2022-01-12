<div class="product bg-light h-100 d-flex flex-column justify-content-between my-xl-3">
    <div class="product-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        @include('../atoms.product-img',['productImageLocation' => $product->image_location])
        <h4 class="title px-2">{{$product->name}}</h4>
    </div>
    <div class="d-flex flex-row justify-content-between align-middle px-2">
        <h4 class="price my-auto">{{$product->price}} lei</h4>
        <button class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="cart bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg m-auto">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="mb-4 bg-light rounded-3">
                <div class="container-fluid">
                    <h1 class="m-4"></h1>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                                                @include('../atoms.product-img',['productImageLocation' => $product->image_location])
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row p-3">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolore earum ex perferendis reprehenderit. Aliquid aperiam atque culpa cupiditate debitis dolor dolorem dolores eius eos eveniet excepturi facilis impedit inventore ipsam molestiae nobis non officia perspiciatis quam quasi quidem reiciendis repellendus suscipit, tempore ullam? Animi architecto dicta doloribus error nisi?
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 m-0 d-flex flex-wrap ">
                <h3 class="my-4">Toppings</h3>
                <div class="row row-cols-2 p-0 m-0">
                @for ($i = 0; $i < 4; $i++)
                        <div class="col my-2 d-flex flex-row justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input mx-3" type="checkbox" id="topping{{$i+1}}">
                                <label class="form-check-label d-flex flex-column" for="topping{{$i+1}}">
                                    <span>
                                        Topping {{$i+1}}
                                    </span>
                                    <span>
                                        50 lei
                                    </span>
                                </label>
                            </div>
                        </div>
                @endfor
                </div>
            </div>
            <button class="btn m-3 btn-outline-secondary btn-lg" type="button">Add</button>
        </div>
    </div>
</div>
