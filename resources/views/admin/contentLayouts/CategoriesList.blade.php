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
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Add New
              Categories</span></a>
          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"> <span>Multiple Delete</span></a>
        </div>
      </div>
    </div>
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
          <th>Details</th>

          <th>Actions</th>
        </tr>
      </thead>

      <tbody id="show-category">
        @foreach($categories as $category)
        <tr>
          <td>
            <span class="custom-checkbox">
              <input type="checkbox" id="checkbox1" name="options[]" value="1">
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
          <td class="p-2">
            <div>actions</div>
            <form>
              <button class="border-0 bg-transparent" data-target="" data-catid="{{ $category->id}}">
                <a href="#editEmployeeModal" data-toggle="modal">
                  <span class="d-inline-block"><img src="{{ asset('img/logo/dark/editLogo.png') }}"></span></a>
              </button>

              <button data-target="" class="border-0 bg-transparent">
                <a href="#deleteEmployeeModal" data-toggle="modal">
                  <span class="d-inline-block"><img src="{{ asset('img/logo/dark/deleteLogo.png') }}"></span>
                </a>
              </button>

            </form>

          </td>
        </tr>
        @endforeach


      </tbody>
    </table>
    <div>Showing {{($categories->currentpage()-1)*$categories->perpage()+1}} to
      {{$categories->currentpage()*$categories->perpage()}}
      of {{$categories->total()}} entries

      {{$categories->links()}}
    </div>

  </div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('categoriesList-Admin.store', $category)}}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old(' $category->name') || $category->name}}"
              placeholder="categoryname">
            <div>{{$errors->first('name')}}</div>
          </div>
          <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" value="{{$category->image}}">
            <div>{{$errors->first('image')}}</div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">

  <div class="modal-dialog">
    <div class="modal-content">
      {{-- <iframe src="/categories/{{$category->url}}" frameborder="0">
      </iframe> --}}

      <form action="{{route('categoriesList-Admin.destroy', $category)}}" method="post">
        @method('DELETE')
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these <b>"{{$category->name}}"</b> Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
          <input type="hidden" name="category_id" id="cat_id">


        </div>
        <div class="modal-footer">s

          <input type="button" class="btn btn-default" data-dismiss="modal" value="No, Cancel">
          <button type="submit" class="btn btn-danger">Deleted</button>
        </div>
        @csrf
      </form>


    </div>
  </div>

</div>
@endsection