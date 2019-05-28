@extends('layouts.app')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                     <p>Brands</p>
                     <?php $brands = DB::table('brands')->get(); ?>
                     @foreach($brands as $brand)
                        <a href="{{ url('brand-products',$brand->name) }}">{{$brand->name}}</a> <br>
                     @endforeach
                </div>    
            </div>

<div class="col-md-9">
    <div class="container bg-light">
        <?php $cate_name=DB::table('categories')->select('name')->where('id',$id_)->get(); ?>
        <h4>
            Category :
            @foreach($cate_name as $c_name)
                {{$c_name->name}}
            @endforeach 
        </h4>
        <br>
        
        <div class="row">
            @forelse($category_products as $product)
            <div class="col-md-3">
                <figure class="card card-product">
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
        <!-- col -->
        @empty
                <h3>No Category for @foreach($cate_name as $c_name) {{$c_name->name}} @endforeach</h3>
        @endforelse
        </div>
    <!-- row -->
    </div>
<!-- container -->
</div>
            
           
        </div>
    </div>
</div>

@endsection