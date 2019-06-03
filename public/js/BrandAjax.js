$(document).ready(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var table = $('#brand_datatable').DataTable({
    retrieve: true,
    processing: true,
    serverSide: true,
    ajax: "{{ route('brandList.index') }}",
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
      // { data: 'url', name: 'url' },

      // URL and Name must same data
      {
        data: 'action',
        name: 'action',
        orderable: false
      },
      { data: "created_at", name: "created_at" },
      { data: "updated_at", name: "updated_at" },
    ]
  });



  $('#createNewProduct').click(function () {
    $('#name').val('');
    $('#url').val('');
    $('#brand_id').val('');
    $('#brandForm').trigger("reset");
    $('#action').val("add");
    $("#action_button").val("add");
    $('#modelHeading').html("Create New Category");
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
        }
      });
    }

    if ($('#action').val() == "edit") {
      $('#storeImage').append();
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
      // beforeSend:function(){
      //  $('#ok_button').text('Deleting...');
      // },
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
