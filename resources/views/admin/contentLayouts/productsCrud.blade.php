@extends('layouts.adminLayout')

@section('title')
Admin | Products List
@endsection

@section('products')


<div class="row">
  <div class="container py-4 mx-auto">
    <div class="col-md-12 h3 col-sm-12 justify-content-xs-center">Product list</div>
    <div align="right" class="m-2">
      <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> <i class="fas fa-plus-circle"></i>
        Create
        New Brand</a>
    </div>
    <div class="col-md-12 col-sm-12">
      <div class="table-reponsive">
        <table class="table  table-bordered" id="product_datatable">
          <thead>
            <tr class="text-white bg-primary">
              <th scope="col" class="text-center">product ID</th>
              <th scope="col">Category ID</th>
              <th scope="col">Brand ID</th>
              <th scope="col" class="text-wrap">Name</th>
              <th scope="col">Image</th>
              <th scope="col">price</th>
              <th scope="col ">Description</th>
              <th scope="col ">Quantity</th>
              <th scope="col" class="">Actions</th>
              <th scope="col">Time Created</th>
              <th scope="col">Time Updated</th>

            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="productModal" name="reset" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-override-width mx-auto">
    <div class=" modal-content modal-override-width ">
      <div class="modal-header">
        <h4 class="modal-title" id="modelHeading"></h4>
      </div>

      <div class="modal-body">

        <span id="form_result"></span>
        <form id="productForm" name="productForm" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf


          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value=""
                maxlength="50">
            </div>
          </div>
          <button type="submit" class="btn btn-white"><span class="fa fa-trash-alt"></span> Search</button>

          <div class="row">
            <div class="col-7">
              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price:</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="price" name="price" placeholder="Enter price"
                    step="0.01" min="0" max="10000000">
                </div>
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Quantity:</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity"
                    value="" required>
                </div>
              </div>
            </div>
          </div>


          <div class="row mx-auto">
            <div class="col-6">

              <label for="sel1">Brand List</label>
              <select class="form-control" id="brandList" name="brandList">
                <?php $brands = DB::table('brands')->get();?>
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}" id="brand_id_data" name="brand_id_data">
                  Name: {{ $brand->name }}
                </option>
                @endforeach
              </select>

            </div>


            <div class="col-6">
              <label for="sel1">Categories List</label>
              <select class="form-control" id="categoryList" name="categoryList">
                <?php $categories = DB::table('categories')->get();?>
                @foreach($categories as $category)
                <option name="category_id_data" id="category_id_data" value="{{ $category->id }}">
                  Name: {{ $category->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>



          <div class="form-group">

            <label class="control-label ml-2 mt-2">Upload Image</label>
            <div class="col-sm-12">
              <input type="file" class="image m-2" id="image" name="image" onchange="$('#preview').show();
                document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
              <span> Image preview </span>
              <div class="row">
                <div class="col-6">
                  <span id="storeImage"></span>
                </div>
                <div class="col-6">
                  <img id="preview" name="preview" alt="" width="100" height="100" class="ml-2" />
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="category_id" id="category_id" />
          <input type="hidden" name="brand_id" id="brand_id" />
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description:</label>
            <textarea name="description" id="description" class="form-control" cols="20" rows="5" maxlength="100"
              placeholder="Enter Description" required></textarea>
          </div>

          <input type="hidden" name="created_at" id="created_at">
          <input type="hidden" name="update_at" id="update_at">

          <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />

            <input type="submit" class="btn btn-primary" id="action_button" value="create" />


          </div>
        </form>
      </div>
    </div>
  </div>
</div>


{{-- Confirm Delete --}}
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Confirmation</h2>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<script>
  $(document).ready(function () {
        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });
  var table = $('#product_datatable').DataTable({
    processing: true,
    serverSide: true,
      ajax: "{{ route('products.index') }}",
      "columnDefs": [
                  {
                      "targets": [ 2 ],
                      "visible": false,
                      "searchable": false
                  },
                  {
                      "targets": [ 1 ],
                      "visible": false,
                      "searchable": false

                  }
              ],
            
      columns: [
        { data: 'id', name: 'id' },
        { data: 'category_id', name: 'category_id' },
        { data: 'brand_id', name: 'brand_id' },
        { data: 'name', name: 'name' },
        {
          data: 'image', name: 'image',
          render: function (data, type, full, meta) {
            var showImage = "";
            var imgdefault = "../imgBrand/default_img.jpg";
            if (imgdefault == data) {
              showImage = "<img src={{ asset('') }}" + data + " width='70' class='img-thumbnail mx-auto'  />";
            } else {

              showImage = "<img src={{ URL::to('/') }}/storage/" + data + " width='70' class='img-thumbnail ' />";
            }

            return showImage;
          },
          orderable: false
        },
        {  data: 'price', name: 'price' },
        {  data: 'description', name: 'description' },
        {  data: 'quantity', name: 'quantity' },

        { data: 'action', name: 'action', orderable: false },

        { data: "created_at", name: "created_at" },

        { data: "updated_at", name: "updated_at" },
      ],
      responsive:true,
      order:[0,'desc']
  });



    $('#createNewProduct').click(function () {
        $('#name').val('');
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#action').val("add");
        $("#action_button").val("add");
        $('#modelHeading').html("Create New product");
        $('#productModal').modal('show');
        $('#storeImage').html('');
        $('#preview').hide();
});

 

$('#productForm').on('submit', function (event) {
event.preventDefault();

$('#brand_id').val($('#brandList option:selected').val());
$('#category_id').val($('#categoryList option:selected').val());

if ($('#action').val() == 'add') {
  $.ajax({
    url: "{{ route('products.store') }}",
    method: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      var html = '';
      if (data.errors) {
        html = '<div class="alert alert-danger">';
        for (var count = 0; count < data.errors.length; count++) {
          html += '<p>' + data.errors[count] + '</p>';
        }
        html += '</div>';
      }
      if (data.success) {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        Swal.fire('Done!', 'It was Succesfully Added', 'success');
        $('#productModal').modal('hide');
        $('#storeImage').html('');
        $('#productForm')[0].reset();
        $('#product_datatable').DataTable().ajax.reload();
      }
      $('#form_result').html('');
    },
    error: function(data, errors){
          alert(data);
      }
  });
}

if ($('#action').val() == "edit") {
  $.ajax({
    url: "{{ route('products.update') }}",
    method: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      var html = '';

      if (data.errors) {
        html = '<div class="alert alert-danger">';
        for (var count = 0; count < data.errors.length; count++) {
          html += '<p>' + data.errors[count] + '</p>';
        }
        html += '</div>';
      }
      if (data.success) {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#storeImage').html('');
        $('#productForm')[0].reset();
        $('#productModal').modal('hide');
        Swal.fire('Done!', 'It was Succesfully Updated', 'success');
        $('#product_datatable').DataTable().ajax.reload();
      }

      $('#form_result').html('');
    },
    error: function (message, status, error) {
      Swal.fire('Error!', message, 'error');
    }
  });
}
});

$(document).on('click', '.edit', function () {
$('#preview').hide();
$('#storeImage').html('');
var product_id = $(this).attr('id');
$('#form_result').html('');
$.ajax({

  url: "/admin/products/" + product_id + '/edit',
  dataType: "json",
  success: function (html) {

    $('#productForm').trigger("reset");
    $('#action').val("edit");
    $("#action_button").val("edit");
    $('#modelHeading').html("Update Products " + html.data.name);
    $('.modal-title').text("Edit New Record");
    $('#category_id').val(html.data.category_id);
    $('#brand_id').val(html.data.brand_id);
    $('#hidden_id').val(html.data.id);
    $('#name').val(html.data.name);
    $('#price').val(html.data.price);
    $('#description').val(html.data.description);
    $('#quantity').val(html.data.quantity);
    $('#storeImage').append("<img src={{ URL::to('/') }}/storage/" + html.data.image + " width='100' class='img-thumbnail'  />");
    $('#storeImage').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");
    $('#productModal').modal('show');
  }
})
});

    var user_id;
    $(document).on('click', '.delete', function () {

    user_id = $(this).attr('data-id');
    $('#confirmModal').modal('show');

    });

    $('#ok_button').click(function () {
    $.ajax({
      type: "DELETE",
      url: "/products/destroy/" + user_id,
      success: function (data) {
        table.draw();
        Swal.fire('Done!', 'It was Succesfully Deleted', 'success');
        setTimeout(function () {
          $('#ok_button').text('Delete');
          $('#confirmModal').modal('hide');
          $('#laravel_datatable').DataTable().ajax.reload();
        }, 200);
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });


}); // End of Document Function
</script>

@endsection