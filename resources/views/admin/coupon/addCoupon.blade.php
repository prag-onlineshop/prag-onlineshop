	<div>
		<h2>Add Coupon</h2>
	</div>


<form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
	<div class="form-group">
    	<label for="name">Coupon Name</label>
	    <input type="text" name="name" class="form-control" value="" required="">
	</div>
	<div class="form-group">
    	<label for="code">Coupon Code</label>
	    <input type="text" name="code" class="form-control" value="" required="">
	</div>
	<div class="form-group">
    	<label for="type">Type</label>
	    <select name="type" id="">
	    	<option value="percent" selected="">Percentage</option>
	    	<option value="fix">Fixed</option>
	    </select>
	</div>
	<div class="form-group">
    	<label for="amount">Amount</label>
	    <input type="number" name="amount" class="form-control" value="" required="" min="0">
	</div>

	<div>
		<input type="submit" value="Add">
	</div>

	@csrf
</form>