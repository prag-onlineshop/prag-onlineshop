<header class="">
    <div class="" id="headerWrap" class="">
        <div class="row">
            <div class="col-10 mx-auto ">
                <div class="header-form ">
                    <div class="homelink">
                        <ul class="float-right">
                            <li><a href="#">CUSTOMER CARE</a> </li>
                            <li><a href="/">HOME</a> </li>
                            @guest
                            <li><a href="/login">LOGIN</a></li>
                            <li><a href="/register">SIGNUP</a> </li>
                            @else
                            <li><a href="/profile">Profile</a> </li>
                            <li><a href="#">WishList</a> </li>
                            <li><a href="/orders">Orders</a></li>
                            <li><a href="#">{{ Auth::user()->name }}</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="header-content p-1 ">
                        <div class="row">
                            <div class="col-10 mx-auto">
                                <div class="row my-2">
                                    <div
                                        class="col-md-12 col-lg-3 col-sm-12  d-flex align-items-center justify-content-center pr-4">
                                        <span class="logoText ">

                                            <a href="/">
                                                <img src="{{ asset('img/logo/logopragstore.png') }}" width="190px"
                                                    height="80px">
                                            </a>
                                        </span>
                                    </div>

                                    <div class="col-sm-12 col-md-12  col-lg-7 m-0 p-0">
                                        <div class="input-group  d-flex justify-content-center">
                                            <input type="text" class="form-control" placeholder="Search Item Here" />
                                            <div class="input-group-append bg-white">
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <img src="{{ asset('img/logo/searchIcon.png') }}" alt=""
                                                        width="20px" height="20px">
                                                </button>
                                            </div>
                                        </div>


                                        <div class="clearfix"></div>
                                        <div class="float-left pt-2">
                                            <div class="dropdown d-inline-block">
                                                <button class="btn-sm btn-primary dropdown-toggle  " type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Categories
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    style="height:100px; overflow-y:auto;">
                                                    <?php $cats=DB::table('categories')->get();
                                                    $cat_product=DB::table('products')->where('category_id','!=','')->groupBy('category_id')->orderBy('id','desc')->get();
                                               ?>
                                                    @foreach($cats as $cat)
                                                    @foreach($cat_product as $product)
                                                    @if($cat->id == $product->category_id)
                                                    <a class="dropdown-item"
                                                        href="{{ url('category',$cat->url) }}">{{ $cat->name }}</a>
                                                    @endif
                                                    @endforeach
                                                    @endforeach

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
                                    <div class="col-lg-2 col-md-12 col-sm-12 pl-0 d-flex justify-content-center">
                                        <div class="float-left">
                                            <button type="button" class="btn">
                                                <a href="{{url('/cart')}}" class="nav-link">
                                                    <span
                                                        class="m-0 float-right badge badge-danger">{{Cart::count()}}</span>
                                                    <img src="{{ asset('img/logo/logoCart.png') }}" alt="" width="40px"
                                                        height="25px">
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>