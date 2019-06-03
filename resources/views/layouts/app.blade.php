<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>pragstore | Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.0.0.min.js') }}"></script>
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 900px)" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    {{-- <script src="asset('js/script.js')"></script> --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>

<body>


    @include('layouts.header')

    @yield('login')

    @yield('content')

    @yield('forgotpassword')
    @yield('userprofile')
    @yield('registration')

    @yield('profileOrder')



    @include('layouts.footer')