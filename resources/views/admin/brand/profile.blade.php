<div class="container">
	<div class="row">
		<div class="col-12">

			<h2>Profile of {{ $brand->name }}</h2>
			<a class="btn btn-primary my-3" href="{{ route('brand.index' )}}">List</a>
			<a class="btn btn-primary" href="{{ route('brand.edit', ['slug' => $brand->name]) }}">Edit</a>
		</div>
	</div>

	<div class="row my-3">
		<div class="col-12">
			<p><strong>Name</strong> {{ $brand->name }}</p>
			<p><strong>Logo</strong>
				<div class="col-4">
					<img src="{{ asset('storage/'. $brand->logo) }}" alt="">
				</div>
			</p>


			<form action="/brand/{{ $brand->id }}" method="POST" class="py-3">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>