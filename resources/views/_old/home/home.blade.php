@extends('layout')
@section('content')
    <main id="content" class="p-3 flex-grow-1">
        <div>
            <div id="carouselExampleIndicators" class="carousel slide rounded-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('./assets/img/index/caro-1.png')}}" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>
                                Some representative placeholder content for the first slide.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./assets/img/index/caro-2.jpg')}}" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>
                                Some representative placeholder content for the second slide.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./assets/img/index/caro-3.jpeg')}}" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>
                                Some representative placeholder content for the third slide.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./assets/img/index/caro-2.jpg')}}" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Fourth slide label</h5>
                            <p>
                                Some representative placeholder content for the fourth slide.
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
                <div class="row">
                    <?
                    for ($i = 1; $i <= 4; $i++) {
                        echo '
                            <div class="col-12 col-md-6 col-lg-3">
                              <div class="card text-white">
                                <img src="./src/img/index/foodMenu' . $i . '.jpeg" class="card-img" alt="..." />
                                <div class="card-img-overlay">
                                  <h5 class="card-title">Menu ' . $i . '</h5>
                                  <p class="card-text">Description ' . $i . '</p>
                                </div>
                              </div>
                            </div>
                          ';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <div class="col-12">
            <a class="anchor" id="anchor-pizza"></a>
            <h2>Top orders</h2>
            <div class="row">
                <?
                for ($i = 1; $i <= 4; $i++) {
                    echo '
                     <div class="col-12 col-md-6 col-xl-3">
                      <div class="card text-white">
                        <img src="./src/img/menu/pizza' . $i . '.jpg" class="card-img" alt="..." />
                        <div class="card-img-overlay">
                          <h5 class="card-title">Order ' . $i . '</h5>
                          <p class="card-text">Description ' . $i . '</p>
                        </div>
                      </div>
                    </div>
                  ';
                }
                ?>
            </div>
        </div>
    </main>
@endsection
