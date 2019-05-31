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
		<div class="bg-overlay py-3">
			<!----------------------------- MOST POPULAR ITEMS ------------------------------->
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<h3>Most popular:</h3>
						<div class="slick-slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 1}'>
							<?php $first = true; ?>
							@foreach($cart_products as $prod)
							@foreach($product_list as $pop)
							@if($pop->id == $prod->product_id)
							@if($first)
							<div class="item-slide p-2">
                              <figure class="card card-product">
                                 <span class="badge-new">BEST SELLER</span>
                                 <div class="img-wrap">
                                    <img src="{{asset('storage/'.$pop->image)}}">
                                 </div>
                                 <figcaption class="info-wrap text-center">
                                    <h6 class="title text-truncate">
                                       <a href="#">{{$pop->name}}</a>
                                       <p>In-stock: {{$pop->quantity}}</p>
                                       <p>qty sold:{{$prod->sum}}</p>
                                    </h6>
                                 </figcaption>
                              </figure>
                           	</div>
							<?php $first = false; ?>
							@else
							<div class="item-slide p-2">
								<figure class="card card-product">
									<div class="img-wrap">
										<img src="{{asset('storage/'.$pop->image)}}">
									</div>
									<figcaption class="info-wrap text-center">
										<h6 class="title text-truncate">
											<a href="#">{{$pop->name}}</a>
											<p>In-stock: {{$pop->quantity}}</p>
											<p>qty sold:{{$prod->sum}}</p>
											<a href="{{url('cart/addItem',$pop->id)}}" class="btn btn-primary btn-sm float-right">Add
												to Cart</a>
										</h6>
									</figcaption>
								</figure>
							</div>
							@endif
							@endif
							@endforeach
							@endforeach
						</div>
					</div>
					<div class="col-sm-2">
						<div class="box" style="height:300px; width:200px; overflow-y:auto">
							<p>Brands</p>
							<?php $brands = DB::table('brands')->get();
							$brand_products = DB::table('products')->where('brand_id', '!=', '')->groupBy('brand_id')->orderBy('id', 'desc')->get();
							?>
							<div>
								@foreach($brands as $brand)
								@foreach($brand_products as $product)
								@if($brand->id == $product->brand_id)
								<span>
									<a href="{{ url('brand-products',$brand->name) }}">{{$brand->name}}</a> <br>
								</span>
								@endif
								@endforeach
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<!----------------------------- END MOST POPULAR ITEMS ------------------------------->
				<hr>
				<!----------------------------- MOST RECENT ITEMS ------------------------------->
				<h3>Most Recent:</h3>
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
								<p> In-stock: {{ $product->quantity }}
									<p>
										<div class="action-wrap">
											<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add
												to Cart</a>
											<div class="price-wrap h5">
												<span class="price-new">{{ $product->price }}</span>
											</div>
											<!-- price-wrap.// -->
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
			</div> {{-- container --}}
			<div style="align-content: center;">{{$products->links()}}</div>
		</div> {{-- Overlay Content End --}}
		<!-----------------------------END MOST RECENT ITEMS ------------------------------->
		@endsection