<div class="add-product">
    <h3>Add Product</h3>
    <form action="{{route('products.store', $product)}}" method="post" enctype="multipart/form-data">    
    @include('admin.product.formProduct')
    <div>
        <button type="submit">Add</button>
    </div>
    @csrf
    </form>
    <button><a href="/products">&lt Back</a></button>
</div>