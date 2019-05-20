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
                      <form action="{{ url('/updateProfile') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @foreach($profile as $pro)
                        <img alt="Card image cap" src="{{ url('images',$pro->photo) }}">

                        <div class="form-group{{ $errors->has('photo')?' has-error':'' }}">
                          <label for="photo">Profile Picture</label>
                          <input type="file" class="form-control" name="photo" id="photo">
                          <span class="text-danger">{{ $errors->first('photo') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('name')?' has-error':'' }}">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $pro->name }}" placeholder="UserName">
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('email')?' has-error':'' }}">
                          <label for="email">Email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $pro->email }}" placeholder="Email">
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('contact')?' has-error':'' }}">
                          <label for="contact">Contact</label>
                          <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" value="{{ $pro->contact }}" placeholder="Contact">
                          <span class="text-danger">{{ $errors->first('contact') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('address')?' has-error':'' }}">
                          <label for="address">Address</label>
                          <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $pro->address }}" placeholder="Address">
                          <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary d-block">Save</button>
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


 