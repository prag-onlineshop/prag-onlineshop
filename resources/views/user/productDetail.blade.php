@extends('layouts.app')
@section('content')

<div class="container">
        <br><br>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail">
                    <img src="{{ url('images', $product->image) }}" class="card-img">
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <h2>{{ $product->name }}</h2>
                <h2 class="text-danger">P {{$product->price}}</h2>
                <p><b>Available :  {{$product->quantity}} In Stock</b></p>
                <p>Description:</p>
                <p>{{ $product->description }}</p>
                <p>Category: {{$product->category->name}}</p>
                <p>Brand: {{$product->brand->name}}</p>
                <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
            </div>
            @endforeach
        </div>
    </div>
@endsection