@extends('layouts.app')
@section('content')




<section class="main-content">
	<div class="bg-carousel">
		<div class="container ">
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
							<img class="d-block w-100 " src="{{ asset('img/slides/img-slide4.jpeg') }}" alt="Third slide">
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
		<div class="bg-overlay py-3">
			<div class="container">
				<h3>Most popular:</h3>
				<div class="slick-slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 1}'>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<span class="badge-new"> NEW </span>
							<div class="img-wrap p-2">
								<img src="{{ asset('img/Bags/Gucci/products/gucci-belt-bag.jpg') }}">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap p-2">

								<img src="{{ asset('img/Shoes/Vans/products/vans-Old-Skool-Pro.jpg') }}">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap py-2">
								<img src="{{ asset('img/Shirts/CalvinKlein/products/CK-logo-crew-shirt.jpg') }}">

							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap p-2">

								<img src="{{ asset('img/Shoes/Converse/products/converse-green.jpg') }}">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap py-2">
								<img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }} ">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap">
								<img src="{{ asset('img/items/1.jpg') }}">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test </a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱430</span>
									</div>
									<!-- price-wrap.// -->
								</div>
								<!-- action-wrap -->
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
					<div class="item-slide p-2">
						<figure class="card card-product">
							<div class="img-wrap">
								<img src="{{ asset('img/items/1.jpg') }}">
							</div>
							<figcaption class="info-wrap text-center">
								<a href="#" class="title">test</a>
								<p>test</p>
								<div class="action-wrap">
									<a href="#" class="btn btn-primary btn-sm float-right">Add to Cart
									</a>
									<div class="price-wrap h5">
										<span class="price-new">₱333</span>
									</div>
									<!-- price-wrap.// -->
								</div>
								<!-- action-wrap -->
							</figcaption>
						</figure>
						<!-- card // -->
					</div>
				</div>
				<hr>
				<h3>Most Recent:</h3>
				<div class="row">
					@forelse($products as $product)

					<div class="col-md-3 ">
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
									<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-primary btn-sm float-right">Add to Cart
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
					<!-- col // -->
					@empty

					<h3>No Products</h3>
					@endforelse

				</div>
				<!-- row.// -->
			</div> {{-- container --}}

		</div> {{-- Overlay Content End --}}


		@endsection