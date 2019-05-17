
<header>
    <div class="container">
        <div class="header-form">
          <ul class="float-right">
                <li><a href="/">home</a> </li>
                <?php if(Auth::check()){ ?>
                <li><a href="userlogin">{{Auth::user()->name}}</a> </li>
                <?php }else{ ?>
                <li><a href="userlogin">Login</a> </li>
                <?php }?>
                <li><a href="#">Signup</a> </li>
                <li><a href="#">Customer Care</a> </li>
           </ul>
        </div>

    </div>
</header>
 



