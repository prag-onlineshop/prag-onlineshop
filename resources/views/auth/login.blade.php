@extends('layouts.app')

@section('login')
<div class="bg-overlay loginContainer ">
  <div class="container  ">
    <div id="loginBox" class="">
      <h3 class="text-dark">Welcome to Pragstore!</h3>
      <hr>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="inputBox{{ $errors->has('email')?' has-error':'' }}">
          <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <label>Email</label>
          @if($errors->any())
          <div class="invalid-feedback d-block">
            {{ $errors->first('email') }}
          </div>
          @endif
        </div>

        <div class="inputBox{{ $errors->has('password')?' has-error':'' }}">
          <input type="password" name="password" required autocomplete="current-password">
          <label>Password</label>
          @if($errors->any())
          <div class="invalid-feedback d-block">
            {{ $errors->first('password') }}
          </div>
          @endif
        </div>
        <br>
        <br>
        <input type="submit" value="Login">
        <hr>
        <div class="reg"> <a href="/register"> Don't yet have an account? Register Here! </a></div>
      </form>

      <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-primary"><i class="fab fa-facebook-f"></i> &nbsp&nbsp&nbsp&nbsp&nbspFacebook</a>
      <a href="{{ url('/auth/google') }}" class="btn btn-google btn-danger"><i class="fab fa-google"></i> &nbsp&nbsp&nbsp&nbsp&nbspGoogle</a>
    </div>
  </div>
</div>

@endsection