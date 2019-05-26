@if(session()->has('add_message'))
<div id="delete-success" role="alert">
    <strong>{{session()->get('add_message')}}</strong>
    <br>
</div>
@elseif(session()->has('del_message'))
<div id="delete-success" role="alert">
    <strong>{{session()->get('del_message')}}</strong>
    <br>
</div>
@endif
<div id="product">
    <div>
        <form action="/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit">Search</button>
                </span>
            </div>
        @csrf
        </form>
    </div>
    <button><a href="products/create">Add Product</a></button>
    <br>
    <table>
        <thead>
            <tr>
                <th>Product</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th>{{$product->name}}</th>
                <th><button><a href="{{route('products.show', $product)}}">Details</a></button></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{$products->links()}}
</div>