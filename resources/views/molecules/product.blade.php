<div class="product bg-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
{{--    <a href="{{route('product',['productId' => $product->id])}}" class="link-light">--}}
    <div class="link-light">
        @include('../atoms.product-img',['productImageLocation' => $product->image_location])
        <h4 class="title text-shadow">{{$product->name}}</h4>
        <h4 class="price text-shadow">{{$product->price}} lei</h4>
    </div>
</div>

{{--<!-- Button trigger modal -->--}}
{{--<button type="button" class="btn btn-primary">--}}
{{--    Launch demo modal--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg m-auto">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
{{--            <div class="modal-body">--}}
{{--                ...--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--            </div>--}}












            <div class="mb-4 bg-light rounded-3">
                <div class="container-fluid">
                    <h1 class="m-4"></h1>
                    {{--            <h6>{{$product[0]}}</h6>--}}
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
{{--                @for ($i = 0; $i < 4; $i++)--}}
{{--                    <div class="row my-2 align-items-center justify-content-between">--}}
{{--                        <div class="col-12 col-lg-8 my-2 my-lg-0 text-center text-lg-start">Topping {{$i+1}}</div>--}}
{{--                        <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">--}}
{{--                            <div class="btn btn-warning text-light topping-add-rm">-</div>--}}
{{--                            <div class="mx-5">2</div>--}}
{{--                            <div class="btn btn-warning text-light topping-add-rm">+</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endfor--}}
                <div class="row row-cols-2 p-0 m-0">
                @for ($i = 0; $i < 4; $i++)

{{--                        <div class="col-12 col-lg-8 my-2 my-lg-0 text-center text-lg-start">Topping {{$i+1}}</div>--}}
{{--                        <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">--}}
{{--                            <div class="btn btn-warning text-light topping-add-rm">-</div>--}}
{{--                            <div class="mx-5">2</div>--}}
{{--                            <div class="btn btn-warning text-light topping-add-rm">+</div>--}}
{{--                            --}}
{{--                        </div>--}}
{{--                        <div class="col-8">Topping {{$i+1}}</div>--}}
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
