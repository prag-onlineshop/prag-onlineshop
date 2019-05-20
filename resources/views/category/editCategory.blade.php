<div id="add-category">
    <h3>Edit {{$category->name}}</h3>
    <form action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @include('category.formCategory')
        <div>
            <button type="submit">Save</button>
        </div>
        @csrf
    </form>
    <button><a href="{{route('categories.show', $category)}}">Cancel</a></button>
</div>