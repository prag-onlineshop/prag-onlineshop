@extends('layouts.adminLayout')

@section('title')
Admin Settings
@endsection

@section('settings')
<h2>Settings</h2>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 border py-3">
            @foreach($settings as $set)
            @endforeach
            <form method="post" action="{{route('settings.store')}}" class="form-horizontal" enctype="multipart/form-data">
                <label for="title">Change Shop Title:</label>
                <input type="text" class="input-control" name="title" id="title" value="{{old('title') ?? $set->title}}">
                <div>{{$errors->first('title')}}</div>
                <br>
                <label for="image">Add Carousel Image:</label>
                <input type="file" multiple class="input-control" id="image" name="image[]"><br>
                <button type="submit" class="btn btn-primary float-right">Save</button>
                @csrf
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<hr>
<div class="container">
    <span>
        <h5>Shop Title:</h5>
    </span>
    @foreach($settings as $setting)
    <p> {{$setting->title}}</p><br>
    @endforeach
    <h5>Carousel Images:</h5><br>
    <div>
        @foreach($carImgs as $carImg)
        <span>
            <div>
                <img src="{{asset('storage/' .$carImg->carImg)}}" alt="image" width="100px" height="100px"><br>
                <form action="{{route('image.destroy', $carImg->id)}}" method="post">
                @method('DELETE')
                <button class="btn btn-danger btn-sm">remove</button>
                @csrf
                </form>
            </div>
        </span>
        @endforeach
    </div>
    <hr>
    <!-- <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="bg-carousel">
                <div class="carouselWrap">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                        <ol class="carousel-indicators">
                        @foreach($settings as $setting)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$setting->id}}" class="active"></li>
                        @endforeach
                        </ol>
                        <div class="carousel-inner">
                        @foreach($settings as $setting)
                            <div class="carousel-item active">
                                <img class="d-block center" src="{{asset('storage/'.$setting->carImg)}}" alt="First slide">
                            </div>
                        @endforeach   
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div> -->
</div>
@endsection