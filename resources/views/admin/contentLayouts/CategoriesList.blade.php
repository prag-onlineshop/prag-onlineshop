@extends('layouts.adminLayout')

@section('CategoriesList')



<div id='msg'>This message will be replaced using Ajax.
  Click the button to replace the message.</div>
<?php
  echo Form::button('Replace Message',['onClick'=>'getMessage()']);
?>

</div>
{{-- 
<div class="container">
  <h2>Categories</h2>
  <table class="table table-striped table-dark" id="test">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">url</th>

      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

</div> --}}

{{-- // var SITEURL = '{{URL::to('')}}';
// $(function(){
// $.ajaxSetup({
// headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });
// $('#test').DataTable({
// processing: true,
// serverSide: true,
// ajax: {
// url: SITEURL + "admin/categories",
// type: "GET",
// dataType:"json",
// },
// "columns": [
// { data: "id", name: "id" },
// { data: "name", name: "name" },
// { data: "url", name: "url" },

// ],
// });
// }); --}}
{{-- </script> --}}

@endsection