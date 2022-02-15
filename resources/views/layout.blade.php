<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pizza Delivery System</title>
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('assets/blog/css/blog.css')}}">
    </head>
    <body class="d-flex flex-column">
    @include('organisms.header')
    <main class=" flex-grow-1 bg-light layered-box px-0 px-lg-3 container-xxl">
        @yield('content')
    </main>
    @include('organisms.footer')
        <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}" crossorigin="anonymous"></script>
        <script src="/assets/js/app.js"></script>
        <script src="/assets/blog/js/blog.js"></script>

    </body>
</html>
