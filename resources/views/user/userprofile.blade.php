@extends('layouts.app')

@section('userprofile')
<div class="bg-profile" id="userprofile"> 
      <div class="container">
   
          <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12  p-3">
                <i class="fas fa-user"></i>
              {{-- <img src="" alt="" width="100px" height="100px"> --}}
              <span><img src="" alt="" width="50px" height="50px"></span>
                 <span class="h4">Username</span>
              <hr>
              <span>
               <ul>
                  <li class="d-block"><a href="#">My Account</a></li>
                  <li class="d-block"><a href="#">profile</a></li>
                  <li class="d-block"><a href="#">My Orders</a></li>
                </ul> 
              </span>
            </div>
            <div class="col-md-9 col-lg-9 col-sm-12 myprofile">
              <p class="h3">My profile</p>
              <h6>Manage and protect your account</h6>
              <hr>
              <div class="row">
                  <div class="col-md-9 col-lg-9 ">
                      <form action="">
                          <p>Email: <span>test@yahoo.com</span></p>
                          <p>phone Number: <span>099333211</span></p>
                          <div class="form-group">
                          <label for="">Username: 
                            <input type="text" placeholder="Value Username here">
                          </label>
                          </div>
                          <div class="form-group">
                              <span>Gender: </span>
                          <span><input type="radio" name="gender">Male</span>
                          <span><input type="radio" name="gender">Male</span>
                        </div>
                          <div class="form-group">
                           <p>Address </p> 
                             <span><textarea name="address" id="address" cols="30" rows="6" placeholder="Enter Address Here"></textarea></span> 
                           
                          </div>
                       

                        <button class="btn btn-primary d-block">Save</button>
                      </form>
                  </div>

                  <div class="col-md-3 col-lg-3">
                    <img src="{{ asset('img/Bags/Gucci/gucci-logo.jpg') }}" alt="" width="130px" height="100px">
                  </div>
              </div>
             
            </div>
          </div>
        </div>
</div>
@endsection


 