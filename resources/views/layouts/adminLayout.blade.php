<!DOCTYPE html>
<html>

<head>
  <title>Laravel DataTable - Tuts Make</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>


  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>


  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
  </script>

</head>

<body>


  <div class="container-fluid">
    <div class="row">
      <div class="col-2 m-0 p-0 sideBarBg text-dark vh-100">
        @include('layouts.sidebarAdmin')
      </div>

      <div class="col-10 m-0 p-0 bg-overlay vb-100">
        @yield('categories')
        @yield('products')
        @yield('brands')
        @yield('coupons')
        @yield('dashboard')
        @yield('reports')
        @yield('orders')
        @yield('settings')

      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
  </script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  </script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}


</body>

</html>