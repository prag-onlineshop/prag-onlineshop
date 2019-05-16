<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <title>Document</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
 
</head>
  <body>
      <div class="container-fluid m-0 p-0 ">
        <div class="" id="headerWrap">
          <div class="container">
          @include('user.layouts.nav')
          </div>
        </div>
        <div class="container">
          <div class="" id="contentWrap">
              @include('user.layouts.content')
          </div>
        </div>


          <footer id="footerWrap">
              @include('user.layouts.footer')
          </footer>
       </div>
  </body>
</html>
