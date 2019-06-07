@extends('layouts.adminLayout')

@section('title')
Admin | Brand List
@endsection

@section('brands')





<div class="container py-4">
  <h2>Brand List</h2>
  <div align="right" class="m-2">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> <i class="fas fa-plus-circle"></i>
      Create
      New Brand</a>
  </div>

  <table class="table table-bordered" id="brand_datatable">
    <thead>
      <tr class="text-white bg-primary">
        <th scope="col">Brand ID</th>
        <th scope="col">Name</th>
        <th scope="col " style="text-align: center;"">Image</th>
          <th scope=" col">Actions</th>
        <th scope="col">Time Created</th>
        <th scope="col">Time Updated</th>

      </tr>
    </thead>
  </table>
</div>
<div class="modal fade" id="brandModal" name="reset" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modelHeading"></h4>
      </div>

      <div class="modal-body">
        <span id="form_result"></span>
        <form id="brandForm" name="brandForm" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="brand_id" id="brand_id">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value=""
                maxlength="50" required="">
            </div>
          </div>

          <div class="form-group">
            </span>
            <label class="control-label">Upload Image</label>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-8"> <input type="file" class="image form-control-file m-2" id="image" name="image"
                    onchange=" $('#preview').show();
                  document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"></div>
                <div class="col-3"> Image preview </div>
              </div>


              <div class="row">
                <div class="col-6">
                  <span id="storeImage"></span>
                </div>
                <div class="col-6">
                  <img id="preview" name="preview" width="100" height="100" />
                </div>
              </div>
            </div>

          </div>
          <input type="hidden" name="url" id="url" value="">
          <input type="hidden" name="created_at" id="created_at">
          <input type="hidden" name="update_at" id="update_at">

          <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" class="btn btn-primary" id="action_button" value="create">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </button>
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
var table = $('#brand_datatable').DataTable({
  processing: true,
  serverSide: true,
  ajax: "{{ route('brands.index') }}",
  columns: [
    { data: 'id', name: 'id' },
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
  
    {
      data: 'action',
      name: 'action',
      orderable: false
    },
    { data: "created_at", name: "created_at" },
    { data: "updated_at", name: "updated_at" },
  ],
  responsive:true,
   order:[0,'desc']
});



$('#createNewProduct').click(function () {
  $('#storeImage').html('');
  $('#preview').hide();
  $('#name').val('');
  $('#url').val('');
  $('#brand_id').val('');
  $('#brandForm').trigger("reset");
  $('#action').val("add");
  $("#action_button").val("add");
  $('#modelHeading').html("Create New Brand");
  $('#brandModal').modal('show');
});

$('#name').change(function () {
  $('#url').val($('#name').val());
});



$('#brandForm').on('submit', function (event) {
  event.preventDefault();
  if ($('#action').val() == 'add') {
    $.ajax({
      url: "{{ route('brand.store') }}",
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
          $('#brandModal').modal('hide');
          $('#storeImage').html('');
          $('#brandForm')[0].reset();
          $('#laravel_datatable').DataTable().ajax.reload();

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
      url: "{{ route('brands.update') }}",
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
          $('#brandForm')[0].reset();
          $('#brandModal').modal('hide');
          Swal.fire('Done!', 'It was Succesfully Updated', 'success');
          $('#brand_datatable').DataTable().ajax.reload();
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
  var brand_id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({

    url: "/admin/brands/" + brand_id + '/edit',
    dataType: "json",
    success: function (html) {

      $('#brandForm').trigger("reset");
      $('#action').val("edit");
      $("#action_button").val("edit");
      $('#modelHeading').html("Update Brand " + html.data.name);
      $('.modal-title').text("Edit New Record");
      $('#hidden_id').val(html.data.id);
      $('#name').val(html.data.name);
      $('#url').val(html.data.name);
      $('#storeImage').append("<img src={{ URL::to('/') }}/storage/" + html.data.image + " width='70' class='img-thumbnail'  />");
      $('#storeImage').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");
      $('#brandModal').modal('show');
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
    url: "/brand/destroy/" + user_id,
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