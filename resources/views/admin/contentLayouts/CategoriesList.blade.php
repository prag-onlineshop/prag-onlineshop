@extends('layouts.adminLayout')

@section('CategoriesList')

<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2><b>Categories: List </b></h2>
        </div>
        <div class="col-sm-6">
          <a href="/category/create" class="btn btn-success" rel="cat_modal" data-toggle="modal" data-target="#add-category"> <span>Add New
              Category</span></a>
          <a href="#" class="btn btn-danger" data-toggle="modal"> <span>Multiple Delete</span></a>
        </div>
      </div>
    </div>
    <div>
<!--------------------------------------- ALERT MESSAGE -------------------------------------->
    @if(session()->has('del_message'))
    <div id="delete-success" role="alert" class="alert-success">
        <strong>{{session()->get('del_message')}}</strong>
        <br>
    </div>
    @elseif(session()->has('add_message'))
    <div id="add-success" role="alert" class="alert-success">
        <strong>{{session()->get('add_message')}}</strong>
        <br>
    </div>
    @elseif(session()->has('update_message'))
    <div id="update-success" role="alert" class="alert-success">
        <strong>{{session()->get('update_message')}}</strong>
        <br>
    </div>
    @endif
    </div>
<!--------------------------------------- TABLE ----------------------------------------->
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
              <input type="checkbox" id="selectAll">
              <label for="selectAll"></label>
            </span>
          </th>
          <th>Image</th>
          <th>Name</th>
          <th>URL</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="show-category">
        @foreach($categories as $category)
        <tr>
          <td>
            <span class="custom-checkbox">
              <input type="checkbox" id="checkbox1" name="options[]" value="{{$category->id}}">
              <label for="checkbox1"></label>
            </span>
          </td>
          <td>
            @if($category->image)
            <div class="row">
              <div><img src="{{asset('storage/'.$category->image)}}" alt="image" width="50px" height="50px">
              </div>
            </div>
            @endif
          </td>
          <td>{{$category->name}}</td>
          <td><a href="/category/{{$category->url}}">{{$category->url}}</a></td>
          <td>
          <div>
            <button href="/category/{{$category->url}}/edit" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-modal">edit</button>
            <button href="/category/{{$category->url}}/delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-category">delete</button>
          </div>
<!---------------------------------------- DELETE CATEGORY MODAL ------------------------------------------>
<div id="delete-category" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{route('categoriesList-Admin.destroy', $category)}}" method="post">
    @method('DELETE')
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete <strong> {{$category->name}} </strong>?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
<!---------------------------------------- END DELETE CATEGORY MODAL ------------------------------------------>
<!---------------------------------------- EDIT CATEGORY MODAL ------------------------------------------>
<div id="edit-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('categories.update', ['category' => $category])}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        @include('admin.category.formCategory')
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
<!---------------------------------------- END EDIT CATEGORY MODAL ------------------------------------------>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
<!--------------------------------------- END TABLE ----------------------------------------->
    <div>Showing {{($categories->currentpage()-1)*$categories->perpage()+1}} to {{$categories->currentpage()*$categories->perpage()}}
    of  {{$categories->total()}} entries
    {{$categories->links()}}
    </div>
<!---------------------------------------- ADD CATEGORY MODAL ------------------------------------------>
<div id="add-category" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{route('categoriesList-Admin.store', $category)}}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        @include('admin.contentLayouts.formCategory')
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
<!---------------------------------------- END ADD CATEGORY MODAL ------------------------------------------>
  </div>
</div>
<div>
@endsection