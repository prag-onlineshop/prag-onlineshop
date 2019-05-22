<div id="add-category">
    <h3>Add Category</h3>
    <form action="{{route('categories.store', $category)}}" method="post" enctype="multipart/form-data">
        @include('admin.category.formCategory')
        <div>
            <button type="submit">Add</button>
        </div>
        @csrf
    </form>
    <button><a href="/categories"> &lt Back</a></button>
</div>