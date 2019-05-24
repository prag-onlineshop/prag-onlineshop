<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Dashboard</title>

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

        @yield('CategoriesList')


      </div> {{-- col-10 end --}}

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>