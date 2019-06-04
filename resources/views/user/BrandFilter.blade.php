@extends('layouts.app')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <?php $brands = DB::table('brands')->get();
                    $products = DB::table('products')->where('brand_id', '!=', '')->groupBy('brand_id')->orderBy('id', 'desc')->get();
                    ?>
                    <p>Brands</p>
                    @foreach($brands as $brand)
                    @foreach($products as $product)
                    @if($brand->id == $product->brand_id)
                    <a href="{{ url('brand-products',$brand->name) }}">{{$brand->name}}</a> <br>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <?php $brands = DB::table('brands')->select('name')->where('id', $brand_id)->get(); ?>
                    <h4>
                        Brand :
                        @foreach($brands as $brand)
                        {{$brand->name}}
                        @endforeach
                    </h4>
                    <br>
                    <div class="row">
                        @forelse($brand_products as $product)
                        <div class="col-md-3 ">
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
                                            <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
                                                to Cart</a>
                                        @else
                                            @php ($carts = [])
                                            @foreach($cartItems as $cartItem)
                                                @php ($carts[] = $cartItem->id)
                                            @endforeach
                                            @if(in_array($product->id, $carts))
                                                <i class="float-right text-muted">Added to cart</i>
                                            @else
                                                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
                                                to Cart</a>
                                            @endif
                                        @endif
                                        <!-- price-wrap.// -->
                                    </div>
                                    <!-- action-wrap -->
                                </figcaption>
                            </figure>
                            <!-- card // -->
                        </div>
                        <!-- col // -->
                        @empty
                        <h3>No Product for @foreach($brands as $brand) {{$brand->name}} available @endforeach</h3>
                        @endforelse
                        <!-- row // -->
                    </div>
                    <!-- container // -->
                </div>
            </div>
        </div>
    </div>

    @endsection