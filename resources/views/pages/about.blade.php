@extends('layout')
@section('content')
    <div class="container py-2">
        <div class="p-1 p-lg-5 mb-1 mb-lg-4 bg-light rounded-3">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold text-center">About Pizza Slice</h1>
                <div class="fs-4 row">
                    <div class="col-12 col-lg-4">
                        <img class="img-fluid" src="{{asset('assets/img/logo.png')}}" alt="Pizza Slice Logo">
                    </div>
                    <div class="col-12 col-lg-8 m-auto">
                    The approach to the menu was easy. We had no interest in trying to reinvent food. We went with choices that were popular catering requests — basic, down-to-earth style. We are known for our generous portions of various food. We will tell you now – save room for dessert!
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-12 col-lg-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Food warnings</h2>
                    <p>We believe in the commitment to our community and in fostering long term relationships with local farmers and fishermen. Our menus reflect our connections and care about preferences, featuring various food annotations about ingredients.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="h-100 p-5 bg-light rounded-3">
                    <h2>We care</h2>
                    <p>We care about you. Let us know about your experience!</p>
                    <a class="btn btn-outline-secondary" type="button" href="{{route('contact')}}">Contact us</a>
                </div>
            </div>
        </div>
    </div>
@endsection
