<div class="bg-primary p-4">
  <h3 class="text-center text-white ">
    <b>PS ADMIN</b>
  </h3>
</div>

<div class="wrap p-2">
  <!--------------------------------------------- DASHBOARD -------------------------------------------->
  <div class="form-group">
    <a href="{{url('/admin/dashboard')}}" class="form-control bg-transparent border-0 text-dark ">
      <img src="{{ asset('img/logo/light/barLogoBlue.png') }}" width="24px" height="24px" class="rounded float-left">
      <h6 class="d-inline-block pl-2">Dashboard</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" class="float-right">
    </a>
  </div>
  <hr class="border-primary">
  <!--------------------------------------------- BRANDS -------------------------------------------->
  <div class=" form-group ">
    <a href="{{url('/admin/brands')}}" class="form-control bg-transparent border-0  text-dark ">
      <img src="{{ asset('img/logo/light/listLogoBlue.png') }}" class="rounded float-left">
      <h6 class="d-inline-block pl-2">Brand</h6>

      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>
  <!--------------------------------------------- PRODUCTS -------------------------------------------->
  <div class=" form-group ">
    <a href="{{url('/admin/products')}}" class="form-control  bg-transparent border-0  text-dark  ">
      <img src="{{ asset('img/logo/light/listLogoBlue.png') }}" class="rounded float-left">
      <h6 class="d-inline-block pl-2">Products</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>
  <!--------------------------------------------- CATEGORIES -------------------------------------------->
  <div class="form-group ">
    <a href="{{url('/admin/category')}}" class="form-control bg-transparent border-0 text-dark ">
      <img src="{{ asset('img/logo/light/listLogoBlue.png') }}" alt="" class="rounded float-left">
      <h6 class="d-inline-block pl-2">Categories</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>

  <!--------------------------------------------- COUPONS -------------------------------------------->
  <div class="form-group ">
    <a href="/admin/coupons" class="form-control bg-transparent border-0   text-dark ">
      <img src="{{ asset('img/logo/light/couponLogoBlue.png') }}" alt="" class="rounded float-left">
      <h6 class="d-inline-block pl-2 ">Coupons</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>
  <hr class=" border-primary">
  <!--------------------------------------------- ORDERS -------------------------------------------->
  <div class="form-group ">
    <a href="/admin/orders" class="form-control bg-transparent border-0   text-dark ">
      <img src="{{ asset('img/logo/light/couponLogoBlue.png') }}" alt="" class="rounded float-left">
      <h6 class="d-inline-block pl-2 ">Orders</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>
  <!--------------------------------------------- REPORTS -------------------------------------------->
  <div class="form-group ">
    <a href="/admin/reports" class="form-control bg-transparent border-0   text-dark ">
      <img src="{{ asset('img/logo/light/couponLogoBlue.png') }}" alt="" class="rounded float-left">
      <h6 class="d-inline-block pl-2 ">Reports</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="float-right">
    </a>
  </div>

  <hr class=" border-primary">
  <!--------------------------------------------- SETTINGS -------------------------------------------->
  <div class="form-group ">
    <a href="/admin/settings" class="form-control bg-transparent border-0   text-dark ">
      <img src="{{ asset('img/logo/light/couponLogoBlue.png') }}" alt="" class="rounded float-left">
      <h6 class="d-inline-block pl-2 ">Settings</h6>
      <img src="{{ asset('img/logo/light/chevronLogoBlue.png') }}" alt="" class="rounded float-right">
    </a>
  </div>
</div>