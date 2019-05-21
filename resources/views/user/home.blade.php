<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('product.store') }}" method="post" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
            <label for="pro_name">Name</label>
            <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Product Name">

            <label for="pro_price">Price</label>
            <input type="text" class="form-control" name="pro_price" id="pro_price" placeholder="Price">

            <label for="pro_info">Description</label>
            <textarea type="text" class="form-control" name="pro_info" id="pro_info" placeholder="Info"></textarea>

            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <option value=""> -- Select Category --</option>
                @foreach($categories as $id=>$category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>

            <label for="spl_price">Quantity</label>
            <input type="text" class="form-control" name="spl_price" id="spl_price" placeholder="Quantity">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>