<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($profile as $pro)
        <img alt="Card image cap" src="{{ url('images',$pro->photo) }}">
        <p>{{ $pro->name }}</p>
        <p>{{ $pro->email }}</p>
        <p>{{ $pro->contact }}</p>
        <p>{{ $pro->address }}</p>
    @endforeach

    <form action="{{ url('/updateProfile') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <input type="file" class="form-control" name="photo" >
        </div>

        <div>
            <input type="text" class="form-control" name="name" placeholder="Product Name">
        </div>

        <div>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>

        <div>
            <input type="text" class="form-control" name="contact" placeholder="con">
        </div>

        <div>
            <input type="text" class="form-control" name="address"  placeholder="add">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>