@foreach($coupons as $coupon)
<div>
	{{ $coupon->id }}
	{{ $coupon->name }}
	{{ $coupon->code }}
	{{ $coupon->type }}

	{{ $coupon->amount }}
	@if($coupon->type=="percent")
		% 
	@else 
		Php 
	@endif
	
	<a href="{{ route('coupon.edit' , [ 'coupon' => $coupon->id ] )}}">Edit</a>




	<!-- <a href="{{ route('coupon.delete', [ 'Coupon' => $coupon->id ]) }}">Delete</a> -->
			<form action="{{ route('coupon.delete', [ 'coupon' => $coupon->id ])}}" method="POST" class="py-3">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
	
@endforeach
<div>
<a href="{{ route('coupon.create')}}">Create coupon</a>
</div>