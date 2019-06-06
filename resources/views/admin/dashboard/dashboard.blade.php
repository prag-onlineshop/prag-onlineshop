@extends('layouts.adminLayout')

@section('title')
Dashboard
@endsection

@section('dashboard')

<h2 class="p-2">Dashboard</h2>
<div class="col-10 mx-auto">


<div class="row">
	<div class="col-lg-4 col-xs-6">
	<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>{{$users}}</h3>
				<p>User Registered</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-people"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	
	<div class="col-lg-4 col-6">
	<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>{{$orders}}</h3>
				<p>Pending Orders</p>
			</div>
			<div class="icon">

				<i class="ion ion-ios-pulse"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

		<div class="col-lg-4 col-6">
	<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{$products}}</h3>
				<p>New Products Today</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>




</div>


	<div class="row">
		<div class="col-5">
			{!! $chart->container() !!}
		</div>
	</div>

	

	

{!! $chart->script() !!}

</div>

@endsection