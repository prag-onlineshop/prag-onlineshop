@extends('layouts.app')
@section('content')

<div class="container">
    <div>
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
    </div>
    <br><br>
    <div class="row my-auto">
        @foreach($products as $product)
        <div class="col-md-6 col-xs-12">
            @if($product->image == '../imgProduct/default_img.jpg')
            <div class="thumbnail"><img src="{{ url('imgProduct', $product->image) }}"></div>
            @else
            <div class="card-img img-responsive"><img src="{{ url('storage/', $product->image) }}"></div>
            @endif
        </div>
        <div class="col-md-5 col-md-offset-1">
            <h2>{{ $product->name }}</h2>
            <h2 class="text-success">P {{$product->price}}</h2>
            @if($product->quantity == 0)
            <p><b>Out of Stock</b></p>
            <p>Category: <a href="{{ url('category-products',$product->category->url) }}">{{$product->category->name}}</a>
            </p>
            <p>Brand: <a href="{{ url('brand-products',$product->brand->name) }}">{{$product->brand->name}}</a></p>
            </p>
            <p>Description: </p>
            <p>{{ $product->description }}</p>
            @else
            <p><b>Available : {{$product->quantity}} In Stock</b></p>
            <p>Category: <a href="{{ url('category-products',$product->category->url) }}">{{$product->category->name}}</a>
            </p>
            <p>Brand: <a href="{{ url('brand-products',$product->brand->name) }}">{{$product->brand->name}}</a></p>
            <p>Description: </p>
            <p>{{ $product->description }}</p>
            <div>
                @if($cartItems->isEmpty())
                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart
                    <i class="fa fa-shopping-cart"></i></a>
                @else
                @php ($carts = [])
                @foreach($cartItems as $cartItem)
                @php ($carts[] = $cartItem->id)
                @endforeach
                @if(in_array($product->id, $carts))
                <i class="text-outline">Added to cart</i>
                @else
                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart
                    <i class="fa fa-shopping-cart"></i></a>
                @endif
                @endif
            </div>
            @endif
        </div>
        @endforeach
    </div>
    <hr>
    @php ( $brands_id = [])
    @foreach ($products as $product)
    @php ( $brands_id[] = $product->brand_id )
    @endforeach
    <h3>Other brand products:</h3>
    <br>
    @foreach($brands as $brand)
    @if(in_array($brand->id, $brands_id))
    <h4><strong>{{$brand->name}}</strong></h4>
    <div class="row box bg-light">
        <div class="col-md-10">
            <div class="multiple-items">
                @foreach($productList as $product)
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
                                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
                                    to Cart</a>
                                @else
                                @php ($carts = [])
                                @foreach($cartItems as $cartItem)
                                @php ($carts[] = $cartItem->id)
                                @endforeach
                                @if(in_array($product->id, $carts))
                                <i class="float-right">Added to cart</i>
                                @else
                                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
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
</div>
</div>
@endsection