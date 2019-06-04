@extends('layouts.adminLayout')

@section('title')
Dashboard
@endsection

@section('dashboard')

<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>User Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>


	<div class="row">
		<div class="col-5">
			{!! $chart->container() !!}
		</div>
	</div>

	

	

{!! $chart->script() !!}

@endsection