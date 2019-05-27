@extends('layouts.adminLayout')

@section('title')
Categories List
@endsection

@section('categories')
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Categories List</h3>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-danger">Multiple Delete</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add" href="#add">Add</button>
                </div>
            </div><!--row -->
        </div><!--table-title -->
<!-------------------------------- ALERTS ---------------------------------->
        <div class="alerts">
            @if(session()->has('del_message'))
            <div id="delete-success" role="alert-md-6" class="alert-success">
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
        </div><!--alerts -->
<!-------------------------------- TABLE CONTENT ---------------------------------->
        <div class="table-content">
            <table class="table table-striped table-hover">
                <thead>
                    <th>
                        <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Option</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="id" name="id" value="{{$category->id}}">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td>
                        @if($category->image)
                            <div>
                                <img src="{{asset('storage/'.$category->image)}}" alt="image" width="50px" height="50px">
                            </div>
                        @endif
                        </td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->url}}</td>
                        <td>
                            <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-catname="{{$category->name}}" data-catid="{{$category->id}}" data-target="#edit" title="edit">e</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-catname="{{$category->name}}" data-catid="{{$category->id}}" data-target="#delete" title="delete">d</button>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--table-content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    Showing {{($categories->currentpage()-1)*$categories->perpage()+1}}
                    to {{$categories->currentpage()*$categories->perpage()}}
                    of  {{$categories->total()}} entries
                </div>
                <div class="col-sm-6">
                {{$categories->links()}}
                </div>
            </div>
        </div>
    </div><!--table-wrapper -->
</div><!--container -->
<div class="modals">
<!-------------------------------- ADD MODAL ---------------------------------->
<div class="modal fade add" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.store', $category)}}" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="add">
                    @include('admin.category.formCategory')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div><!--end modal-->
<!-------------------------------- EDIT MODAL ---------------------------------->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="name" >Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.update', ['category' => $category])}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
                <div class="modal-body">
                <input type="hidden" name="id" id="cat_id" value="">
                @include('admin.category.formCategory')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            @csrf
            </form>
        </div>
    </div>
</div><!--end modal-->
<!-------------------------------- DELETE MODAL ---------------------------------->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.destroy', $category)}}" method="post">
            @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="id" id="cat_id" value="">
                    Do you want to delete &nbsp
                    <input name="name" id="name" value="" readonly style="border: none; width: auto; font-weight: bold;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            @csrf
            </form>
        </div>
    </div>
</div><!--end modal-->
</div><!--end modals-->
@endsection