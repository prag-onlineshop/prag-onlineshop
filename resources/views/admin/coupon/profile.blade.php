<form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
	@include('admin.coupon.form')
	<button type="submit" class="btn btn-primary">Save Changes</button>
</form>


