<header class="">
    <div class="" id="headerWrap" class="">
        <div class="row">
            <div class="col-10 mx-auto ">
                <div class="header-form ">
                    <div class="homelink">

                        <div class="dropdown dropdown-header float-right p-0 m-0  form-control">
                            <button class="btn btn-secondary dropdown-toggle form-control " type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Menu
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item " href="#">HOME</a>
                                @guest
                                <a class="dropdown-item" href="#">LOGIN</a>
                                <a class="dropdown-item" href="#">SIGNUP</a>

                                @else
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Orders</a>
                                <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                <div>
                                    <a class="dropdown-item" {{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                            </div>
                        </div>

                        <ul class="float-right nav-header">
                            <li><a href="#">CUSTOMER CARE</a> </li>
                            <li><a href="/">HOME</a> </li>
                            @guest
                            <li><a href="/login">LOGIN</a></li>
                            <li><a href="/register">SIGNUP</a> </li>
                            @else
                            <li><a href="/profile">Profile</a> </li>
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
                                        <form action="{{url('/search-item')}}" method="get">
                                            <div class="input-group  d-flex justify-content-center">
                                                <input type="search" name="search" class="form-control"
                                                    placeholder="Search Item Here" />
                                                <div class="input-group-append bg-white">
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <img src="{{ asset('img/logo/searchIcon.png') }}" alt=""
                                                            width="20px" height="20px">
                                                    </button>
                                                </div>
                                            </div>
                                            @csrf
                                        </form>
                                        <div class="clearfix"></div>
                                        <div class="float-left pt-2">
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-primary dropdown-toggle   " type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Categories
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    style="height:100px; overflow-y:auto;">
                                                    <?php $cats = DB::table('categories')->get();
                                                    $cat_product = DB::table('products')->where('category_id', '!=', '')->groupBy('category_id')->orderBy('id', 'desc')->get();
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
                                                <?php
                                                $product_list = DB::table('products')->where('quantity', '!=', 0)
                                                    ->where('category_id', '!=', '')
                                                    ->where('brand_id', '!=', '')
                                                    ->get();
                                                $brands = DB::table('brands')->get();
                                                $cart_products = DB::table('carts_product')->groupBy('product_id')
                                                    ->selectRaw('sum(qty) as sum, product_id')
                                                    ->orderBy('sum', 'desc')
                                                    ->get();

                                                $count = 0;
                                                ?>
                                                <ul class="d-inline-block pl-3">
                                                    @foreach($cart_products as $prod)
                                                    @foreach($product_list as $pop)
                                                    @if($pop->id == $prod->product_id)
                                                    @foreach($brands as $brand)
                                                    @if($brand->id == $pop->brand_id)
                                                    <?php if ($count == 5) break; ?>
                                                    <li>
                                                        <a
                                                            href="{{ url('brand-products',$brand->name) }}">{{$brand->name}}</a>
                                                    </li>
                                                    <?php $count++; ?>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                    @endforeach
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