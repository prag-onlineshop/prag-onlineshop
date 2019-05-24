<form action="{{route('categoriesList-Admin.destroy', $category)}}" method="post">
    @method('DELETE')
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
    @csrf
</form>


<div id="show-category">
    @if(session()->has('update_message'))
    <div id="update-success" role="alert">
        <strong>{{session()->get('update_message')}}</strong>
        <br>
    </div>
    @endif
    <h3>{{$category->name}} Details</h3>
    @if($category->image)
    <div class="row">
        <div><img src="{{asset('storage/'.$category->image)}}" alt="image"></div>
    </div>
    @endif
    <p>Name: {{$category->name}}</p>
    <p>Url: {{$category->url}}</p>
    <button><a href="/categories"> &lt Back</a></button>
    <button><a href="/categories/{{$category->url}}/edit">Edit</a></button>
    <button><a href="/categories/{{$category->url}}/delete">Delete</a></button>
</div>