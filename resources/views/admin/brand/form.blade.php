
	    <div class="form-group">
	    	<label for="name">Brand Name</label>
    	    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $brandurl->name }}">
			{{ $errors->first('name') }}
	    </div>
	    <div class="form-group d-flex flex-column">
	    	<label for="logo">Logo</label>
				<div class="col-4">
					<img src="{{ asset('storage/'. $brandurl->logo) }}" alt="">
				</div>
    	    <input type="file" name="logo" class="py-2" value="{{ old('logo') ?? asset('storage/'. $brandurl->logo) }}">
    		{{ $errors->first('logo') }}
    		<!-- {{ old('logo') ?? asset('storage/'. $brandurl->logo) }}  -->
	    </div>
	    <div class="form-group">
	    	<label for="url">Url</label>
    	    <input type="text" name="url" class="form-control" value="{{ old('url') ?? $brandurl->url }}">
    		{{ $errors->first('url') }}
	    </div>

		@csrf
	

