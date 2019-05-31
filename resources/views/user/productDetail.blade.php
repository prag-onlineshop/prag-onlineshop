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
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail">
                    <img src="{{ url('images', $product->image) }}" class="card-img" width="300px" height="300px">
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <h2>{{ $product->name }}</h2>
                <h2 class="text-danger">P {{$product->price}}</h2>
                @if($product->quantity == 0)
                    <p><b>Out of Stock</b></p>
                    <p>Category: {{$product->category->name}}</p>
                <p>Brand: <a href="{{ url('brand-products',$product->brand->name) }}">{{$product->brand->name}}</a></p></p>
                <p>Description: </p>
                <p>{{ $product->description }}</p>
                @else
                <p><b>Available :  {{$product->quantity}} In Stock</b></p>
                <p>Category: <a href="{{ url('category-products',$product->category->name) }}">{{$product->category->name}}</a></p>
                <p>Brand: <a href="{{ url('brand-products',$product->brand->name) }}">{{$product->brand->name}}</a></p>
                <p>Description: </p>
                <p>{{ $product->description }}</p>
                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                @endif
            </div>
            <div class="container">
            @endforeach
        </div>
    </div>
@endsection