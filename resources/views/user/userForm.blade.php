<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
</head>
<body>
    <div class="container-fluid m-0 p-0 ">
        <div class="" id="headerWrap">
          <div class="container">
          @include('user.layouts.userFormData')
          </div>
        </div>

        <div class="container">
            <div class="" id="contentWrap">
              <h2>This is user form</h2>
                @include('user.layouts.content')
            </div>
          </div>
        
        <footer id="footerWrap">
            @include('user.layouts.footer')
        </footer>
     </div>
</body>
</html>