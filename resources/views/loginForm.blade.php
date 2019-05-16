<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Login Form </title>
    <link href="{{ asset('css/app.css')}}"rel="stylesheet"/>
</head>

<body>
    <div id="loginBox">
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

            <div class="forgot-pass"> <a href="">Forgot Password? </a></div>
            <div class="reg"> <a href=""> Don't yet have an account? Register Here! </a></div>
        </form>  
    </div>
</body>


</html>
