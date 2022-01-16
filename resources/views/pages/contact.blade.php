@extends('layout')
@section('content')
    <form class="mt-5">
        <div class="row">
            <div class="mb-3 col-12 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
        </div>
        <div class="mb-3 form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Message</label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-secondary">Send</button>
            </div>
            <div class="col-md-6 text-md-end m-auto">
                <div>Help center: +373 79 123 456</div>
            </div>
        </div>
    </form>
@endsection
