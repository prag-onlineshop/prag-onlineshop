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
{{--    
  
<header>
    <div class="" id="headerWrap">
            <div class="container">
                <div class="header-form">
                    <div class="homelink">
                        <ul class="float-right">
                            <li><a href="/">CUSTOMER CARE</a> </li>
                            <li><a href="#">HOME</a> </li>
                            <li><a href="userlogin">LOGIN</a></li>
                            <li><a href="#">SIGNUP</a> </li>
                        </ul>
                    </div>
                <div class="clearfix"></div>
                    <div class="header-content p-1 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-sm-12  d-flex align-items-center ">
                                        <span class="logoText "><img src="{{ asset('img/logo/logopragstore.png') }}" width="190px" height="80px" ></span>
                                    </div>
                                    <div class="col-md-12 col-lg-7 col-sm-12  d-flex align-items-center ">
                                    <div class="search">
                                            <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search Item Here" aria-label="Search Item Here" aria-describedby="button-addon2">
                                                    <span class="input-group-addon input-group-addon-btn bg-white">
                                                    <button class="btn " type="submit class="searchBtn"><img src="{{ asset('img/logo/searchIcon.png') }}" alt="" ></button>
                                                </span>
                                            </div>
                                            
                                          
                                        <div class="float-left pt-2">
                                            <div class="dropdown d-inline-block">
                                                    <button class="btn-sm btn-primary dropdown-toggle  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Categories
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                  </div>

                                                <ul class="d-inline-block pl-3">
                                                    <li><a href="#">Nike</a></li>
                                                    <li><a href="#">Addidas</a></li>
                                                    <li><a href="#">Converse</a></li>
                                                    <li><a href="#">Vans</a></li>
                                                </ul>
                                            </div>
                                      
                                        </div> 
                                    </div>
                                    <div class="clearfix"></div>
                                      <div class="col-lg-2 px-0">
                                   
                                      
                                      </div>
                                </div>     row
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</header> --}}

@include('layouts.header')

    @yield('login')
    @yield('content')
    @yield('forgotpassword')
    @yield('userprofile')

@include('layouts.footer')

{{-- 
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
</html> --}}