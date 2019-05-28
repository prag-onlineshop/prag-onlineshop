<div class="form-group">
	<label for="name">Brand Name</label>
	<input type="text" name="name" class="form-control" value="{{ old('name') ?? $brand->name }}">
	{{ $errors->first('name') }}
</div>
<div class="form-group d-flex flex-column">
	<label for="logo">Logo</label>
	<div class="col-4">
		<img src="{{ asset('storage/'. $brand->logo) }}" alt="">
	</div>
	<input type="file" name="logo" class="py-2" value="{{ old('logo') ?? asset('storage/'. $brand->logo) }}">
	{{ $errors->first('logo') }}
</div>


@csrf