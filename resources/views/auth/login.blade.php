@extends('layouts.app')

@section('login')
<div class="bg-overlay loginContainer ">
    <div class="container  ">
        <div id="loginBox" class="" >
            <h3>Welcome to Pragstore!</h3>
            <hr>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="inputBox">
                    <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label>Email</label>
                  @if($errors->any())
                     <div class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                     </div>
                  @endif
                </div>

                <div class="inputBox">
                    <input type="password" name="password" required autocomplete="current-password">
                    <label>Password</label>
                  @if($errors->any())
                     <div class="invalid-feedback d-block">
                        {{ $errors->first('password') }}
                     </div>
                  @endif
                </div>
                  <input type="submit" value="Login">
                  <hr>
                  <div class="forgot-pass"> <a href="#">Forgot Password? </a></div>
                  <div class="reg"> <a href="#"> Don't yet have an account? Register Here! </a></div>
              </form>  
          </div>
        </div>
</div>

@endsection
