<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Login</title>
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
              
             <div class="forgotPasswordFormWrap mt-4">
               @include('user.layouts.forgotPasswordForm')
              </div>
              
          </div>
      </div>

      <footer id="footerWrap">
          @include('user.layouts.footer')
      </footer>
  </div>
</body>
</html>