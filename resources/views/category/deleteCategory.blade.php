<div id="delete-category">
    <form action="{{route('categories.destroy', $category)}}" method="post">
    @method('DELETE')
    <h2>You want to delete <b>"{{$category->name}}"</b> ?</h2>
    <button>YES</button>
    @csrf
    </form>
    <button><a href="{{route('categories.show', $category)}}">NO</a></button>
</div>