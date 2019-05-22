@extends('layouts.app')

@section('profileOrder')

<div class="bg-profile" id="userprofile">
	<div class="container py-2">

    <div class="row">
			<div class="col-md-3 col-lg-3 col-sm-12  p-3">
				<i class="fas fa-user"></i>
      
              
					<span>
						<img src="" alt="" width="50px" height="50px">
						</span>
						<span class="h4">Username</span>
						<hr>
							<span>
								<ul>
									<li class="d-block">
										<a href="#">My Account</a>
									</li>
									<li class="d-block">
										<a href="#">profile</a>
									</li>
									<li class="d-block">
										<a href="#">My Orders</a>
									</li>
								</ul>
							</span>
						</div>
                        <div class="col-md-9 col-lg-9 col-sm-12 myprofile"><ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="shipped-tab" data-toggle="tab" href="#shipped" role="tab" aria-controls="shipped" aria-selected="false">Shipped</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="false">Paid</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
<div class="container">

<div class="row">
	<main class="col-sm-12">

<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('img/items/1.jpg') }}"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name goes here </h6>
		<dl class="dlist-inline small">
		  <dt>Size: </dt>
		  <dd>XXL</dd>
		</dl>
		<dl class="dlist-inline small">
		  <dt>Color: </dt>
		  <dd>Orange color</dd>
		</dl>
	</figcaption>
</figure> 
	</td>
	<td> 
		<span class="text-mute"> 1 </span>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">₱ 145</var> 
			<small class="text-muted">(₱ each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<span> PENDING </span>
	</td>
</tr>

</tbody>
</table>

</figure>

	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= --></div>


  <div class="tab-pane fade" id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
      <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
<div class="container">

<div class="row">
	<main class="col-sm-12">

<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('img/items/1.jpg') }}"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name goes here </h6>
		<dl class="dlist-inline small">
		  <dt>Size: </dt>
		  <dd>XXL</dd>
		</dl>
		<dl class="dlist-inline small">
		  <dt>Color: </dt>
		  <dd>Orange color</dd>
		</dl>
	</figcaption>
</figure> 
	</td>
	<td> 
		<span class="text-mute"> 1 </span>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">₱ 145</var> 
			<small class="text-muted">(₱ each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<span> SHIPPED </span>
	</td>
</tr>

</tbody>
</table>

</figure>

	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= --></div>
  </div>
  <div class="tab-pane fade" id="paid-tab" role="tabpanel" aria-labelledby="paid-tab">
      <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
<div class="container">

<div class="row">
	<main class="col-sm-12">

<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('img/items/1.jpg') }}"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name goes here </h6>
		<dl class="dlist-inline small">
		  <dt>Size: </dt>
		  <dd>XXL</dd>
		</dl>
		<dl class="dlist-inline small">
		  <dt>Color: </dt>
		  <dd>Orange color</dd>
		</dl>
	</figcaption>
</figure> 
	</td>
	<td> 
		<span class="text-mute"> 1 </span>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">₱ 145</var> 
			<small class="text-muted">(₱ each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<span> PAID </span>
	</td>
</tr>

</tbody>
</table>

</figure>

	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= --></div>
      
  </div>
</div>
 </div>

@endsection