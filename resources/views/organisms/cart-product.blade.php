<div class="row mb-3">
    <div class="col-12 col-md-6 col-lg-5 order-1">
        @include('../atoms.product-img')
    </div>
    <div class="col-12 col-md-6 col-lg-7 order-3 order-md-2">
        <div class="col-12 d-flex justify-content-between py-2">
            <div class="d-flex">
                <button type="submit" class="btn btn-outline-secondary d-flex justify-content-center" style="width: 70px; height: 100%;">
                    <span class="p-1">
                        -
                    </span>
                </button>
                <div class="d-flex align-items-center justify-content-center" style="width: 70px; height: 100%;">
                    <span class="p-1">
                        1
                    </span>
                </div>
                <button type="submit" class="btn btn-outline-secondary d-flex justify-content-center" style="width: 70px; height: 100%;">
                    <span class="p-1">
                        +
                    </span>
                </button>
            </div>
            <button type="submit" class="btn btn-outline-secondary p-2 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </button>
        </div>
        <div class="col-12 mt-2 d-flex align-items-center justify-content-start">
            <span class="p-1 h4">
                50 lei
            </span>
        </div>
    </div>
    <div class="col-12 order-2 order-lg-3">
        <div class="list-group ms-2 pt-2">
            @include('../molecules.cart-product-topping', ['isLast' => false])
            @include('../molecules.cart-product-topping', ['isLast' => false])
            @include('../molecules.cart-product-topping', ['isLast' => false])
            @include('../molecules.cart-product-topping', ['isLast' => true])
        </div>
    </div>
    <hr>
</div>
