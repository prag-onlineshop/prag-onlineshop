@extends('layouts.app')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @forelse($products as $product)
            <div class="col-md-3 ">
                <figure class="card card-product">
                    <span class="badge-new"> NEW </span>
                    <div class="img-wrap  p-2">
                        <img src="{{ url('img', $product->image) }}">
                        <a class="btn-overlay" href="{{ url('productDetail',$product->id) }}">
                            <i class="fa fa-search-plus"></i> Quick view
                        </a>
                    </div>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">{{ $product->name }} </a>
                        <p>{{ $product->description }}</p>
                        <div class="action-wrap">
                            <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
                                to Cart
                            </a>
                            <div class="price-wrap h5">
                                <span class="price-new">₱{{ $product->price }}</span>
                            </div>
                            <!-- price-wrap.// -->
                        </div>
                        <!-- action-wrap -->
                    </figcaption>
                </figure>
                <!-- card // -->
            </div>
            @empty
                <h3>No Item</h3>
            @endforelse
        </div>
    </div>
</div>

@endsection