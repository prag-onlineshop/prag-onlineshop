@extends('layouts.app')

@section('content')

    <div class="container">
    	<div class="row">
            <div class="col-12">
                <h2>Edit details of {{ $brand->name }}</h2>
            </div>
        </div>

        <div class="row py-3">

            <div class="col-4">
                <form action="/brand/{{ $brand->id }}" method="POST">
                    @method('PATCH')
                    @include('admin.brand.form')

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection

