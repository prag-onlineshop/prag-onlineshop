@extends('admin.layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">
			
			<h2>Profile of {{ $brandurl->name }}</h2>
			<a class="btn btn-primary my-3" href="{{ route('brand.index' )}}">List</a>
			<a class="btn btn-primary" href="/brand/{{ $brandurl->url }}/edit">Edit</a>
		</div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <p><strong>Name</strong> {{ $brandurl->name }}</p>
            <p><strong>Logo</strong> 
				<div class="col-4">
					<img src="{{ asset('storage/'. $brandurl->logo) }}" alt="">
				</div>
            </p>
            <p><strong>Url</strong> {{ $brandurl->url }}</p>

			<form action="/brand/{{ $brandurl->id }}" method="POST" class="py-3">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
        </div>
    </div>
</div>





@endsection