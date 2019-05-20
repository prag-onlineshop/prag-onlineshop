<!DOCTYPE html>
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
   
  
<!-- <header>
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
</header> -->

    @include('layouts.header')

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
</body>
</html>
