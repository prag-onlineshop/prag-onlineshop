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
              <h2 class="text-center mt-4">login here</h2>
              <div class="loginForm">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut reprehenderit quidem culpa nihil, nulla nemo quia neque. Dignissimos ipsa numquam eveniet amet corporis nisi quis quasi ipsam dolores voluptas. Dignissimos.</p>
              </div>
            @include('user.layouts.loginForm')
          </div>
      </div>

      <footer id="footerWrap">
          @include('user.layouts.footer')
      </footer>
  </div>
</body>
</html>