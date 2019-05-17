@extends('admin.layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-12">
            <h2>Brand List</h2>
        </div>
    </div>

	<div class="row py-3">
		<div class="col-12">
		<p><a href="{{ route('brand.create') }}">Add New Brand</a></p>
		</div>
	</div>

	@foreach($brands as $brand)
		<div class="row">
			<div class="col-2">
				{{ $brand->id }}
			</div>
			<div class="col-4">
				<a href="/brand/{{ $brand->id }}">{{ $brand->name }}</a>
			</div>
			<div class="col-4">
				{{ $brand->logo }}
			</div>
			<div class="col-2">
				{{ $brand->url }}
			</div>
		</div>
		

	@endforeach


</div>




@endsection


