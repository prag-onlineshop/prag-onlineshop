@extends('layouts.app')

@section('login')
<div class="bg-overlay loginContainer ">
    <div class="container  ">
        <div id="loginBox" class="" >
            <h3>Welcome to Pragstore!</h3>
            <hr>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="inputBox{{ $errors->has('email')?' has-error':'' }}">
                    <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label>Email</label>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="inputBox{{ $errors->has('password')?' has-error':'' }}">
                    <input type="password" name="password" required autocomplete="current-password">
                    <label>Password</label>
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                    <br>
                    <br>
                  <input type="submit" value="Login">
                  <hr>
                  <div class="forgot-pass"> <a href="#">Forgot Password? </a></div>
                  <div class="reg"> <a href="/register"> Don't yet have an account? Register Here! </a></div>
              </form>  
          </div>
        </div>
</div>

@endsection
