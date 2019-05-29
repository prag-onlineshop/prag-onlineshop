<form action="{{route('categoriesList-Admin.destroy', $category)}}" method="post">
    @method('DELETE')
<<<<<<< HEAD
    <div class="modal-header">
        <h4 class="modal-title">Delete Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete these <b>"{{$category->name}}"</b> Records?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
    </div>
    <div class="modal-footer">

        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-danger" value="Delete">

    </div>
=======
    <h2>You want to delete <b>"{{$category->name}}"</b> ?</h2>
    <button type="submit">YES</button>
>>>>>>> 0f1b8b485c088cb0fa9c4b958cc40bcc6fa7217f
    @csrf
</form>


{{-- <div id="delete-category">
    <form action="{{route('categories.destroy', $category)}}" method="post">
@method('DELETE')
<h2>You want to delete <b>"{{$category->name}}"</b> ?</h2>
<button>YES</button>
@csrf
</form>
<button><a href="{{route('categories.show', $category)}}">NO</a></button>
</div> --}}