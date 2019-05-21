<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <title>Document</title>


    <script src="{{ asset('js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/fontawesome/css/fontawesome-all.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <link href="{{ asset('plugins/slickslider/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/slickslider/slick-theme.css') }}" rel="stylesheet" />
    <script src="{{ asset('plugins/slickslider/slick.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>


    @include('layouts.header')

    @yield('login')
    @yield('content')
    @yield('forgotpassword')
    @yield('userprofile')
    @yield('registration')

    @include('layouts.footer')