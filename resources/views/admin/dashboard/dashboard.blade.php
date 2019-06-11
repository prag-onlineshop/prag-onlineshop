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
			<a href="" data-toggle="modal" data-target="#usersmodal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



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


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="usersmodal">
	
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			      
			<div class="modal-header">
        		<h4 class="modal-title" id="exampleModalLabel">List of registered users</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>

			<div class="modal-body">
					<div class="container-fluid">
								<div class="row bg-warning">
									<div class="col-sm-3 rowheader">Name</div>	
									<div class="col-sm-3 rowheader">Email</div>	
									<div class="col-sm-4 rowheader">Address</div>
									<div class="col-sm-1 rowheader">Type</div>
									<div class="col-sm-1 rowheader">Action</div>
								</div>
								@foreach($usersList as $list)

									<div class="row">
										<div class="col-sm-3 user">{{$list->name}}</div>	
										<div class="col-sm-3 user">{{$list->email}}</div>	
										<div class="col-sm-4 user">{{$list->address}}</div>
										@if($list->admin == 1)
											<div class="col-sm-1 admintext">
												Admin
											</div>
										@else
											<div class="col-sm-1 user">User</div>
										@endif
										<div class="col-sm-1 user">
											<a href="" data-toggle="modal" data-target="#editmodal" class="btn-primary btn-sm editCategory text-white"><i class="fa fa-edit blue"></i></a>
											<a href="#" class="btn-danger btn-sm text-white"><i class="fa fa-trash red"></i></a>
										</div>
									</div>
								@endforeach
					</div>
			</div>
		</div>
	</div>
</div>

<!-- 

			<a href="" data-toggle="modal" data-target="#usersmodal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
 -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true" id="editmodal">

	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			      
			<div class="modal-header">
        		<h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>

			<div class="modal-body">
					<div class="container-fluid">
						<div class="row">Name</div>
						<div class="row">Password</div>
						<div class="row">Email</div>
						<div class="row">
							<input type="checkbox" value="Admin">Admin
						</div>
					</div>
			</div>

      	</div>
  	</div>
</div>



@endsection