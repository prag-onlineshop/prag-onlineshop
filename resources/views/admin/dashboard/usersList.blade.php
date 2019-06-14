@extends('layouts.adminLayout')


@section('title')
List of users
@endsection

@section('userlist')

<h2 class="p-2">List of registered users</h2>


<div class="container py-3 px-5">
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
			<div class="col-sm-1 action">
				<a  href="#" id="edit" 
					data-edit-id="{{$list->id}}"
					data-edit-name="{{$list->name}}" 
					data-edit-email="{{$list->email}}" 
					data-edit-address="{{$list->address}}" 
					data-edit-type="{{$list->admin}}"
					data-toggle="modal" data-target="#editmodal" class="passID btn-primary btn-sm editCategory text-white"><i class="fa fa-edit blue"></i></a>
				
				<a href="#" class="btn-danger btn-sm text-white"><i class="fa fa-trash red"></i></a>
			</div>
		</div>
	@endforeach
</div>



<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('list.update', ['user' =>]) }}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
       	
		@method('PATCH')
		<input type="hidden" name="userid" id="id" value="">
		@include('admin.dashboard.form')
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>





@endsection


					




