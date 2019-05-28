	<div>
		<h2>Add Coupon</h2>
	</div>


<form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
	@include('admin.coupon.form')
	<div>
		<input type="submit" value="Add">
	</div>
</form	