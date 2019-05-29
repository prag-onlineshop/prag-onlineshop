<div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{old('name') ?? $product->name}}">
    <div>{{$errors->first('name')}}</div>
</div>
<div>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*" value="{{old('image') ?? $product->image}}">
    <div>{{$errors->first('image')}}</div>
</div>
<div>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="{{old('price') ?? $product->price}}" placeholder="10,000.00">
    <div>{{$errors->first('price')}}</div>
</div>
<div>
    <label for="description">Description:</label>
    <textarea name="description" id="description" value="{{old('description') ?? $product->description}}">{{old('description') ?? $product->description}}</textarea>
    <div>{{$errors->first('description')}}</div>
</div>
<div>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="{{old('quantity') ?? $product->quantity}}">
    <div>{{$errors->first('quantity')}}</div>
</div>
<hr>
<div>
    <label for="category">Category:</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}} >{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="brand">Brand:</label>
    <select name="brand_id" id="brand_id">
    <option disabled>Select Brand</option>
        @foreach($brands as $brand)
            <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
        @endforeach
    </select>
</div>