<div id="add-category">
    <h3>Edit {{$category->name}}</h3>
    <form action="{{route('categories.update', ['category' => $category])}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @include('admin.category.formCategory')
        <div>
            <button type="submit">Save</button>
        </div>
        @csrf
    </form>
    <button><a href="/categories/{{$category->url}}">Cancel</a></button>
</div>