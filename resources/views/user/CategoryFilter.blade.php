@extends('layouts.app')
@section('content')
<div class="bg-overlay bg-light">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box">
                        <p class="h3">Categories</p>
                        <?php $categories = DB::table('categories')->get();
                    $products = DB::table('products')->where('category_id', '!=', '')->groupBy('category_id')->orderBy('id', 'desc')->get();
                    ?>
                        @foreach($categories as $category)
                        @foreach($products as $product)
                        @if($category->id == $product->category_id)
                        <a href="{{ url('category-products',$category->url) }}">{{$category->name}}</a><br>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container bg-light">
                        <?php $cate_name = DB::table('categories')->select('name')->where('id', $id_)->get(); ?>
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
</div>
@endsection