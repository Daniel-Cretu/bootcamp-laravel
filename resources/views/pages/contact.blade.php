@extends('layout')
@section('content')
    <div class="mt-5">
        <h4>Contact us</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST"  name="contact-form">
            <div class="row">
                <div class="mb-3 col-12 col-md-6">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control">
                </div>
            </div>
            <div class="mb-3 form-floating">
                <textarea id="message" name="message" value="{{ old('message') }}" class="form-control" placeholder="Leave a comment here"></textarea>
                <label for="message">Message</label>
            </div>
            <div class="form-group">
                <div class="form-check my-2">
                    <input class="form-check-input" @if(old('readTerms')) checked @endif name="readTerms" type="checkbox" id="gridCheck" value="1">
                    <label class="form-check-label" for="gridCheck">
                        I acknowledge the rules
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-outline-secondary">Send</button>
                </div>
                <div class="col-md-6 text-md-end m-auto">
                    <div>Help center: +373 79 123 456</div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection
