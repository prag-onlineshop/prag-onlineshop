@extends('layouts.app')
@section('content')
<section class="main-content">
   <!----------------------------- CAROUSEL ------------------------------->
   <div class="bg-carousel">
      <div class="container">
         <div class="carouselWrap">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block w-100 " src="{{ asset('img/slides/img-slide.jpeg') }}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{ asset('img/slides/img-slide2.jpeg') }}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{ asset('img/slides/img-slide4.jpeg') }}" alt="Third slide">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
      <!----------------------------- END CAROUSEL ------------------------------->
      <div class="bg-overlay py-3 ">
         <!----------------------------- MOST POPULAR ITEMS ------------------------------->
         <div class="container">
            <div class="row">
               <div class="col-md-10">
         </div>
   </div>
   <!----------------------------- END MOST POPULAR ITEMS ------------------------------->

   <!----------------------------- MOST RECENT ITEMS ------------------------------->
   <div class="container mt-3">
      <h3>Most Recent:</h3>
      <hr>
      <div class="row">
         @forelse($products as $product)
         <div class="col-md-3">
            <figure class="card card-product">
               <div class="img-wrap">
                  <img src="{{ url('images', $product->image) }}">
                  <a class="btn-overlay" href="{{ url('productDetail',$product->id) }}">
                     <i class="fa fa-search-plus"></i> Quick view
                  </a>
               </div>
               <figcaption class="info-wrap">
                  <a href="#" class="title">{{ $product->name }} </a>
                  <p style="white-space: nowrap; width: 200px; overflow: hidden; text-overflow: ellipsis;">
                     {{ $product->description }}
                  </p>
                  <p>In-stock: {{$product->quantity}}</p>
                  <div class="action-wrap">
                     <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add to
                        Cart</a>
                     <div class="price-wrap h5">
                        <span class="price-new">₱{{ $product->price }}</span>
                     </div>
                     <!-- action-wrap -->
               </figcaption>
            </figure>
            <!-- card // -->
         </div>
         <!-- col // -->
         @empty
         <h3>No Products</h3>
         @endforelse
      </div>
      <!-- row.// -->
      <div>{{$products->links()}}</div>
   </div>

   {{-- container --}}
   </div>
   </div>
   {{-- Overlay Content End --}}
   <!-----------------------------END MOST RECENT ITEMS ------------------------------->
</section>
@endsection