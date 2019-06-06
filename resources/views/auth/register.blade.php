@extends('layouts.app')

@section('content')
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<script type="text/javascript">
   var onloadCallback = function() {
     grecaptcha.render('captcha-prag', {
       'sitekey' : '6LexZ6cUAAAAAPToougcUuT9zivGriFx1II-XmaP'
     });
   };
</script>

<div class="bg-overlay">
   <div class="container py-3">
      <div class="card m-auto " style="min-height: 100%;">
         <article class="card-body m-auto col-md-8">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>

            <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="form-group input-group{{ $errors->has('name')?' has-error':'' }}">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full name"
                     required autocomplete="name" autofocus>
                  <span class="text-danger">{{ $errors->first('name') }}</span>
               </div>

               <!-- form-group// -->
               <div class="form-group input-group{{ $errors->has('email')?' has-error':'' }}">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email address"
                     value="{{ old('email') }}" required autocomplete="email">
                  @if($errors->any())
                  <div class="invalid-feedback d-block">
                     {{ $errors->first('email') }}
                  </div>
                  @endif
               </div>

               <!-- form-group// -->
               <div class="form-group input-group{{ $errors->has('password')?' has-error':'' }}">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="password" name="password" class="form-control" required autocomplete="new-password"
                     placeholder="Create password">
                  @if($errors->any())
                  <div class="invalid-feedback d-block">
                     {{ $errors->first('password') }}
                  </div>
                  @endif
               </div>

               <!-- form-group// -->
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input name="password_confirmation" type="password" class="form-control"
                     placeholder="Confirm password" required autocomplete="new-password">
               </div>

               <div class="form-group">
<<<<<<< HEAD
                  <label for="ReCaptcha">Recaptcha:</label>
                  <div class="mx-auto" id="captcha-prag">
=======
                  <button type="submit" class="btn btn-block"> Create Account  </button>
               </div>
>>>>>>> 247e617059b118de355522d7796f168dbf10008d

                     {!! NoCaptcha::renderJs() !!}
                     {!! NoCaptcha::display() !!}
                  </div>
                  <!-- form-group// -->
                  <div class="form-group mt-3">
                     <button type="submit" class="btn btn-primary btn-block" data-callback='onSubmit'> Create Account
                     </button>
                  </div>
               </div>
               <p class="text-center">Have an account? <a href="/login">Log In</a> </p>
      </div>



      <!-- form-group// -->

      </form>

      </article>
   </div>
   <!-- card.// -->
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>


@endsection