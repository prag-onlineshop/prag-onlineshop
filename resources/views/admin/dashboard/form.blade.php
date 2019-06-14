
	<div class="form-group">
    	<label for="name">Name</label>
	    <input type="text" name="name" class="form-control" value="" required="" id="name">
	</div>

	<div class="form-group">
    	<label for="email">Email</label>
	    <input type="text" name="email" class="form-control" value="" required="" id="email">
	</div>

	<div class="form-group">
    	<label for="address">Address</label>
	    <input type="text" name="address" class="form-control" value="" required="" id="address">
	</div>
	
	<div class="form-group">
    	<label for="type">Type</label>
    	<select name="type" id="type">
    		<option value="" {{ old('type')=='1' ? 'selected' : '' }}>Admin</option>
    		<option value="" {{ old('type')=='' ? 'selected' : '' }}>User</option>
    		
    	</select>
	</div>





@csrf