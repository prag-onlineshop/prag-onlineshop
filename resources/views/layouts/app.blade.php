<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <title>pragstore | Home</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 900px)" />
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>


    @include('layouts.header')

    @yield('login')
    <div class="container">
        @yield('content')
    </div>
    @yield('forgotpassword')
    @yield('userprofile')
    @yield('registration')

    @yield('profileOrder')



    @include('layouts.footer')