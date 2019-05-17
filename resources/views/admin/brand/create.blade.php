@extends('layouts.app')

@section('content')

    <div class="container">
    	<div class="row">
            <div class="col-12">
                <h2>Add New Brand</h2>
            </div>
        </div>

        <div class="row py-3">

            <div class="col-4">
                <form action="/brand" method="POST" enctype="multipart/form-data">
                    @include('admin.brand.form')

                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </form>
            </div>
        </div>
    </div>
@endsection

