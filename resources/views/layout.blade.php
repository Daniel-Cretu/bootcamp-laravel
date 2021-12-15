<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pizza Delivery System</title>
<<<<<<< HEAD
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    </head>
    <body class="d-flex flex-column">
    @include('organisms.header')
    <main class=" flex-grow-1 bg-light layered-box px-0 px-lg-3 container-xxl">
        @yield('content')
    </main>
    @include('organisms.footer')
    <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}" crossorigin="anonymous"></script>
=======
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    </head>
    <body class="container-xxl p-0 d-flex flex-column">
    @include('header')
    @yield('content')
    @include('footer')
>>>>>>> Resolved some conflicts
    </body>
</html>
