<div id="delete-product">
    <form action="{{route('products.destroy', $product)}}" method="post">
    @method('DELETE')
    <h3>You want to delete <b>"{{$product->name}}"</b> ?</h3>
    <button>YES</button>
    @csrf
    </form>
    <button><a href="{{route('products.show', $product)}}">NO</a></button>
</div>