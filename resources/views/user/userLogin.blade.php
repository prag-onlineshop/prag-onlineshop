@extends('layouts.app')

@section('login')
<div class="container my-3 loginContainer ">
    <div id="loginBox" class="" >
        <h3>Welcome to Pragstore!</h3>
          <form>
              <div class="inputBox">
                  <input type="text" name="" required="">
                  <label>Username</label>
              </div>
              <div class="inputBox">
                  <input type="password" name="" required="">
                  <label>Password</label>
              </div>
              <input type="submit" name="" value="Login">
              <div class="forgot-pass"> <a href="/forgotPass">Forgot Password? </a></div>
              <div class="reg"> <a href=""> Don't yet have an account? Register Here! </a></div>
          </form>  
      </div></div>

@endsection
  

