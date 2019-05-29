@extends('layouts.app')

@section('content')
<div class="bg-overlay"> 
   <div class="container pt-3">
      <div class="card w-50 d-flex mx-auto ">
         <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>

            <form method="POST" action="{{ route('register') }}">
              @csrf
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full name" required autocomplete="name" autofocus>
               </div>

               <!-- form-group// -->
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email">
                  @if($errors->any())
                     <div class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                     </div>
                  @endif
               </div>

               <!-- form-group// -->
               <div class="form-group input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="password" name="password" class="form-control" required autocomplete="new-password" placeholder="Create password" >
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
                  <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" required autocomplete="new-password">

                  
               </div>

               <!-- form-group// -->                                      
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
               </div>

               <!-- form-group// -->      
               <p class="text-center">Have an account? <a href="/login">Log In</a> </p>
            </form>

         </article>
      </div>
      <!-- card.// -->
   </div>
</div>
@endsection
