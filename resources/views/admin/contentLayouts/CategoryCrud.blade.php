<!DOCTYPE html>
<html>

<head>
  <title>Laravel DataTable - Tuts Make</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
  </script>


</head>

<body>
  <div class="container">
    <h2>Categories List</h2>
    <div align="right" class="m-2">
      <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
    </div>

    <table class="table table-bordered" id="laravel_datatable">
      <thead>
        <tr class="text-white bg-primary">
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col " style="text-align: center;"">Image</th>
          {{-- <th scope="col">url</th> --}}
          <th scope=" col">Actions</th>
          <th scope="col">Time Created</th>
          <th scope="col">Time Updated</th>

        </tr>
      </thead>
    </table>
  </div>
  <div class="modal fade" id="catModal" name="reset" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modelHeading"></h4>
        </div>

        <div class="modal-body">
          <span id="form_result"></span>
          <form id="catForm" name="catForm" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cat_id" id="cat_id">
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
                <input type="file" class="image form-control-file" id="image" name="image">
                <span id="storeImage">
              </div>

            </div>
            <input type="hidden" name="url" id="url" value="">
            {{-- <div class="form-group">
              <label class=" col-sm-2 control-label">URL</label>
              <div class="col-sm-12">
                <input type="text" name="url" id="url" placeholder="URL">
              </div>
            </div> --}}
            <input type="hidden" name="created_at" id="created_at">
            <input type="hidden" name="update_at" id="update_at">

            <div class="col-sm-offset-2 col-sm-10">
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="submit" class="btn btn-primary" id="action_button" value="create">
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

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  {{-- 
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}


  <script type="text/javascript">
    $(document).ready(function () {
  
  $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
   var table=  $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ route('category.index') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'image', name: 'image',
                    render: function(data, type, full, meta){
                      
                      var showImage = "";
                      var imgdefault ="../imgCategory/default_img.jpg";
                      if(imgdefault == data)
                      {
                        showImage ="<img src={{ asset('') }}" + data + " width='70' class='img-thumbnail mx-auto'  />";
                      } else {
                        
                        showImage ="<img src={{ URL::to('/') }}/storage/" + data + " width='70' class='img-thumbnail ' />";
                      }

                    return showImage;
                    },
                    orderable: false },
                    // { data: 'url', name: 'url' },
                  
                    // URL and Name must same data
                    {
                      data: 'action',
                      name: 'action',
                      orderable: false
                    },
                    { data: "created_at", name:"created_at"},
                    { data: "updated_at", name:"updated_at"},
                 ]
        });

       
    
     $('#createNewProduct').click(function () {
      $('#storeImage').html('');
      $('#name').val('');
      $('#url').val('');
        $('#cat_id').val('');
        $('#catForm').trigger("reset");
        $('#action').val("add");
        $("#action_button").val("add");
        $('#modelHeading').html("Create New Category");
        $('#catModal').modal('show');
    });

    // var catName =$('#name').val();
    // var SlugNameUrl;
    // SlugNameUrl = $('#url').val(catName);
    $('#name').change(function() {
      $('#url').val($('#name').val());
    });



    $('#catForm').on('submit', function(event){
   
      event.preventDefault();
 
        if($('#action').val() == 'add')
         {
        $.ajax({
         url: "{{ route('category.store') }}",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data){
            var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            Swal.fire('Done!','It was Succesfully Added','success');
            $('#catModal').modal('hide');
            $('#storeImage').html('');
            $('#catForm')[0].reset();
            $('#laravel_datatable').DataTable().ajax.reload();

            }
            $('#form_result').html('');
            }
        });
       }
    
if($('#action').val() == "edit")
  {

    $('#storeImage').append();
   $.ajax({
    url:"{{ route('category.update') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
 
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#storeImage').html('');
      $('#catForm')[0].reset();
      $('#catModal').modal('hide');
      Swal.fire('Done!','It was Succesfully Updated','success');
  
      $('#laravel_datatable').DataTable().ajax.reload();
 
     
     }
   
     $('#form_result').html('');
    },
    error: function (message, status, error) {
      Swal.fire('Error!','Name must 3 letter above and Unique Data','error');
          }
   });
  }
});
$(document).on('click', '.edit', function () {

$('#storeImage').html('');
var category_id = $(this).attr('id');


$('#form_result').html('');
$.ajax({

url: "/admin/category/"+ category_id + '/edit',
dataType:"json",
 success:function(html){

  $('#catForm').trigger("reset");
  $('#action').val("edit");
  $("#action_button").val("edit");
  $('#modelHeading').html("Update Category " + html.data.name);
  $('.modal-title').text("Edit New Record");
    $('#hidden_id').val(html.data.id);
    $('#name').val(html.data.name);
    $('#url').val(html.data.name); 
    $('#storeImage').append("<img src={{ URL::to('/') }}/storage/"+ html.data.image + " width='70' class='img-thumbnail'  />");
    $('#storeImage').append("<input type='hidden' name='hidden_image' value='"+ html.data.image+"' />");
    $('#catModal').modal('show');
  }
})

});
   
   var user_id;

$(document).on('click', '.delete', function(){

 user_id = $(this).attr('data-id');
 $('#confirmModal').modal('show');

});

$('#ok_button').click(function(){
 $.ajax({
   type: "DELETE",
  url:"/category/destroy/"+user_id,
  // beforeSend:function(){
  //  $('#ok_button').text('Deleting...');
  // },
  success:function(data)
  {
    table.draw();
    Swal.fire('Done!','It was Succesfully Deleted','success');
   setTimeout(function(){
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

});

  </script>
</body>

</html>