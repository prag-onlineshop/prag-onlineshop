@if(session()->has('update_message'))
<div id="update-message" role=alert>
    <strong>{{session()->get('update_message')}}</strong>
    <br>
</div>
@endif
<div id="show-category">
 <h3>{{$product->name}} Details</h3>
    <p>Image:</p>
    @if($product->image)
    <div class="row">
        <div><img src="{{asset('storage/'.$product->image)}}" alt="image" width="300" height="300"></div>
    </div>
    @endif
    <p>Product: {{$product->name}}</p>
    <p>Description: {{$product->description}}</p>
    <p>Price: {{$product->price}}</p>
    <p>Quantity: {{$product->quantity}}</p>
    <p>Category: {{$product->category['name']}}</p>
    <p>Brand: {{$product->brand['name']}}</p>
    <button><a href="/products"> &lt Back</a></button>
    <button><a href="{{route('products.edit', $product)}}">Edit</a></button>
    <button><a href="{{route('products.delete', $product)}}">Delete</a></button>
</div>