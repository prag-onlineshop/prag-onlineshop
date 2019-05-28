	<div class="form-group">
    	<label for="name">Coupon Name</label>
	    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $coupon->name }}" required="">
	    	{{ $errors->first('name') }}
	</div>
	<div class="form-group">
    	<label for="code">Coupon Code</label>
	    <input type="text" name="code" class="form-control" value="{{ old('code') ?? $coupon->code }}"" required="">
	    	{{ $errors->first('code') }}
	</div>
	<div class="form-group">
    	<label for="type">Type</label>
	    <select name="type" id="">
	    	<option value="percent" {{ old('type',$coupon->type)=='percent' ? 'selected' : '' }}>Percentage</option>
	    	<option value="flat" {{ old('type',$coupon->type)=='flat' ? 'selected' : '' }}>Flat</option>
	    </select>
	</div>
	<div class="form-group">
    	<label for="amount">Amount</label>
	    <input type="number" name="amount" class="form-control" value="{{ old('amount') ?? $coupon->amount }}" required="" min="0">
	    	{{ $errors->first('amount') }}
	</div>



	@csrf