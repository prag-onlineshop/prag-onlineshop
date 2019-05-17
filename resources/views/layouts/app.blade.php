<!DOCTYPE html>
<<<<<<< HEAD
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
=======
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <title>Document</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
</head>
<body>
   
  
<header>
    <div class="" id="headerWrap">
            <div class="container">
                <div class="header-form">
                    <div class="homelink">
                        <ul class="float-right">
                            <li><a href="/">home</a> </li>
                            <li><a href="userlogin">Login</a> </li>
                            <li><a href="#">Signup</a> </li>
                            <li><a href="#">Customer Care</a> </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
        
                    <div class="header-content " >
                            <div class="container">
                                <div class="row">
                                    <div class=""col-md-3 col-lg-3   d-flex align-items-center ">
                                        <span class="logoText ">PRAGSTORE</span>
                                    </div>
                                    <div class="col-md-9 col-lg-9  d-flex align-items-center ">
                                    <div class="search">
                                        <input type="text" placeholder="Search item here"> 
                                        <button>Search</button>
                                    </div>  
                                <img src="" alt="">
                                </div>
                            </div>
                            <div class="float-right">
                                    <ul>
                                        <li><a href="">Nike</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                        <li><a href="">Addidas</a></li>
                                    </ul>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</header>

    @yield('login')

    <div class="bg-content">
      <div class="container">
          @yield('content')
      </div>
   
    </div>



    @yield('forgotpassword')

    @yield('userprofile')


  <footer>
        <div class="container"> 
           <div class="footerContent">
            <div class="row">
                <div class="col-4"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam magnam suscipit iusto reiciendis iste accusantium rem ducimus officia, saepe, cumque et unde molestias sunt rerum voluptatum dignissimos ut nemo.</p>
                </div>
                <div class="col-4"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam magnam suscipit iusto reiciendis iste accusantium rem ducimus officia, saepe, cumque et unde molestias sunt rerum voluptatum dignissimos ut nemo.</p>
                </div>
                <div class="col-4"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam magnam suscipit iusto reiciendis iste accusantium rem ducimus officia, saepe, cumque et unde molestias sunt rerum voluptatum dignissimos ut nemo.</p>
                </div>
          </div>
        </div></div>
        
      </footer>
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
</body>
</html>
