<div class="edit-product">
    <h3>Edit {{$product->name}}</h3>
    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">    
    @method('PATCH')
    @include('admin.product.formProduct')
    <div>
        <button type="submit">Save</button>
    </div>
    @csrf
    </form>
    <button><a href="{{route('products.show', $product)}}">Cancel</a></button>
</div>