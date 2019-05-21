<header>
    <div class="" id="headerWrap">
        <div class="container">
            <div class="header-form">
                <div class="homelink">
                    <ul class="float-right">
                        <li><a href="#">CUSTOMER CARE</a> </li>
                        <li><a href="/">HOME</a> </li>
                        <?php if(Auth::check()){ ?>
                        <li><a href="/profile">Profile</a> </li>
                        <li><a href="#">WishList</a> </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li><a href="/login">LOGIN</a></li>
                        <li><a href="/register">SIGNUP</a> </li>
                        <?php }?>

                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="header-content p-1 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-sm-12  d-flex align-items-center pr-0">
                                <span class="logoText ">

                                    <a href="/">
                                        <img src="{{ asset('img/logo/logopragstore.png') }}" width="190px"
                                            height="80px">
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-12 col-lg-7 col-sm-12  float-right">
                                <div class="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Item Here"
                                            aria-label="Search Item Here" aria-describedby="button-addon2">
                                        <span class="input-group-addon input-group-addon-btn bg-white">
                                            <button class="btn " type="submit class=" searchBtn">
                                                <img src="{{ asset('img/logo/searchIcon.png') }}" alt="">
                                            </button>
                                        </span>
                                    </div>
                                    <div class="float-left pt-2">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn-sm btn-primary dropdown-toggle  " type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Categories
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                        <ul class="d-inline-block pl-3">
                                            <li>
                                                <a href="#">Nike</a>
                                            </li>
                                            <li>
                                                <a href="#">Addidas</a>
                                            </li>
                                            <li>
                                                <a href="#">Converse</a>
                                            </li>
                                            <li>
                                                <a href="#">Vans</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-2 col-md-2  pl-0">
                                <div class="float-left">
                                    <button type="button" class="btn">
                                        <a href="{{url('/cart')}}" class="nav-link">
                                            <span class="m-0 float-right badge badge-danger">{{Cart::count()}}</span>
                                            <img src="{{ asset('img/logo/logoCart.png') }}" alt="" width="40px"
                                                height="25px">
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div> {{-- row --}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>