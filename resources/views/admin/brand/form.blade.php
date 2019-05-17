
	    <div class="form-group">
	    	<label for="name">Brand Name</label>
    	    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $brand->name }} ">
			{{ $errors->first('brandname') }}
	    </div>
	    <div class="form-group d-flex flex-column">
	    	<label for="logo">Logo</label>
    	    <input type="file" name="logo" class="py-2" value="{{ old('name') ?? $brand->logo }} ">
    		{{ $errors->first('logo') }}
	    </div>
	    <div class="form-group">
	    	<label for="url">Url</label>
    	    <input type="text" name="url" class="form-control" value="{{ old('url') ?? $brand->url }}">
    		{{ $errors->first('url') }}
	    </div>

		@csrf
	

