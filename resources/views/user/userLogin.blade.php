@extends('layouts.app')

@section('login')
<div class="bg-overlay loginContainer ">
    <div class="container  ">
        <div id="loginBox" class="" >
            <h3>Welcome to Pragstore!</h3>
            <hr>
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
                  <hr>
                  <div class="forgot-pass"> <a href="#">Forgot Password? </a></div>
                  <div class="reg"> <a href="#"> Don't yet have an account? Register Here! </a></div>
              </form>  
          </div>
        </div>
</div>


@endsection
  

