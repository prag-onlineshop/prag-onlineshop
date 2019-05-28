<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Add New Brand</h2>
        </div>

        <a class="btn btn-primary my-3" href="{{ route('brand.index' )}}">List</a>
    </div>

    <div class="row py-3">

        <div class="col-4">
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @include('admin.brand.form')

                <button type="submit" class="btn btn-primary">Add Brand</button>
            </form>
        </div>
    </div>
</div>