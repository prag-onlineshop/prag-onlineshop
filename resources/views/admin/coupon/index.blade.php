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
	


@endforeach
<div>
<a href="{{ route('coupon.create')}}">Create coupon</a>

</div>