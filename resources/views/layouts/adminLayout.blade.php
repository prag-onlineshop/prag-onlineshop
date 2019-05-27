<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
      if(this.checked){
        checkbox.each(function(){
          this.checked = true;                        
        });
      } else{
        checkbox.each(function(){
          this.checked = false;                        
        });
      } 
    });
    checkbox.click(function(){
      if(!this.checked){
        $("#selectAll").prop("checked", false);
      }
    });
    });
  </script>

</head>

<body>


  <div class="container-fluid">

    <div class="row">

      <div class="col-2 m-0 p-0  sideBarBg text-dark  vh-100">
        @include('layouts.sidebarAdmin')
      </div>


      <div class="col-10 m-0 p-0  bg-overlay vh-100">

        <div class="headerRight"></div>

        @yield('categories')
        @yield('products')
        @yield('brands')
        @yield('coupons')
        @yield('dashboard')
        @yield('reports')
        @yield('orders')
        @yield('settings')

      </div> {{-- col-10 end --}}

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript">
  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('catname')
    var cat_id = button.data('catid') // Extract info from data-* attributes
    var modal = $(this)

    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #cat_id').val(cat_id)
  })

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('catname')
    var cat_id = button.data('catid') // Extract info from data-* attributes
    var modal = $(this)

    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #cat_id').val(cat_id)
  })
    </script>
</body>

</html>