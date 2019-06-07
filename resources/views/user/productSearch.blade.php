@extends('layouts.app')
@section('content')
<div class="bg-overlay bg-light">
    <div class="album py-5  ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-3 col-sm-12">
                    <div class="box">
                        <h5 class="text-muted">Related Products:</h5>
                        <hr>
                        @php ($relCats = [])
                        @foreach($products as $product)
                        @php ($relCats[] = $product->category_id)
                        @endforeach

                        @php ($relProds = [])
                        @foreach($categories as $category)
                        @if(in_array($category->id,$relCats))
                        @php ($relProds[] = $category->id)
                        @endif
                        @endforeach

                        @foreach($relProducts as $product)
                        @if(in_array($product->category_id,$relProds))
                        <a href="{{ url('productDetail',$product->id) }}">{{$product->name}}</a><br>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="container bg-light">
                        <h4>
                            Search for item:
                            {{$search}}
                        </h4>
                        <br>
                        <div class="row">
                            @forelse($products as $product)
                            <div class="col-md-4 col-sm-12">
                                <figure class="card card-product">
                                    <div class="img-wrap  p-2">

                                        @if($product->image == '../imgProduct/default_img.jpg')
                                        <img src="{{ url('imgProduct', $product->image) }}">
                                        @else
                                        <img src="{{ url('storage/', $product->image) }}">
                                        @endif
                                        <a class="btn-overlay" href="{{ url('productDetail',$product->id) }}">
                                            <i class="fa fa-search-plus"></i> Quick view
                                        </a>
                                    </div>
                                    <figcaption class="info-wrap">
                                        <h4 class="text-primary">{{ $product->name }} </h4>
                                        <div>
                                            <p class="price-new">₱{{ $product->price }}</p>
                                        </div>
                                        <div class="action-wrap">
                                            @if($cartItems->isEmpty())
                                            <a href="{{url('cart/addItem',$product->id)}}"
                                                class="btn btn-primary btn-sm float-right">Add
                                                to Cart</a>
                                            @else
                                            @php ($carts = [])
                                            @foreach($cartItems as $cartItem)
                                            @php ($carts[] = $cartItem->id)
                                            @endforeach
                                            @if(in_array($product->id, $carts))
                                            <i class="float-right text-muted">Added to cart</i>
                                            @else
                                            <a href="{{url('cart/addItem',$product->id)}}"
                                                class="btn btn-primary btn-sm float-right">Add
                                                to Cart</a>
                                            @endif
                                            @endif
                                        </div>
                                        <!-- action-wrap -->
                                    </figcaption>
                                </figure>
                                <!-- card // -->
                            </div>
                            <!-- col -->
                            @empty
                            <h3>No Products for @foreach($products as $product) {{$product->name}} @endforeach</h3>
                            @endforelse
                        </div>
                        <!-- row -->
                    </div>
                    <!-- container -->
                </div>
            </div>
            <hr>
            <!--  -->

            @php ($relBrands = [])
            @foreach($products as $product)
            @php ($relBrands[] = $product->brand_id)
            @endforeach

            @php ($relProds = [])
            @foreach($brands as $brand)
            @if(in_array($brand->id,$relBrands))
            @php ($relProds[] = $brand->id)
            @endif
            @endforeach




            <h4>Other brand products:</h4>
            <br>
            @foreach($brands as $brand)
            @if(in_array($brand->id, $relBrands))
            <h4>Brand: <strong>{{$brand->name}}</strong></h4>
            <div class="row box bg-light">
                <div class="col-md-10 col-sm-12">
                    <div class="multiple-items">
                        @foreach($relProducts as $product)
                        @if($brand->id == $product->brand_id)
                        <div class="item-slide p-2">
                            <figure class="card card-product">
                                <div class="img-wrap">
                                    <img src="{{asset('storage/'.$product->image)}}">
                                    <a class="btn-overlay" href="{{ url('productDetail',$product->id) }}">
                                        <i class="fa fa-search-plus"></i> Quick view
                                    </a>
                                </div>
                                <figcaption class="info-wrap text-center">
                                    <h6 class="title text-truncate">
                                        <h5 style="color:blue;">{{ $product->name }} </h5>
                                        <p>In-stock: {{$product->quantity}}</p>
                                        @if($cartItems->isEmpty())
                                        <a href="{{url('cart/addItem',$product->id)}}"
                                            class="btn btn-primary btn-sm float-right">Add
                                            to Cart</a>
                                        @else
                                        @php ($carts = [])
                                        @foreach($cartItems as $cartItem)
                                        @php ($carts[] = $cartItem->id)
                                        @endforeach
                                        @if(in_array($product->id, $carts))
                                        <i class="float-right">Added to cart</i>
                                        @else
                                        <a href="{{url('cart/addItem',$product->id)}}"
                                            class="btn btn-primary btn-sm float-right">Add
                                            to Cart</a>
                                        @endif
                                        @endif
                                    </h6>
                                </figcaption>
                            </figure>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <!--  -->
        </div>
    </div>
</div>
@endsection