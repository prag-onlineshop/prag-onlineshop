<div id="show-category">
@if(session()->has('update_message'))
<div id="update-success" role="alert">
    <strong>{{session()->get('update_message')}}</strong>
    <br>
</div>
@endif
 <h3>{{$category->name}} Details</h3>
    @if($category->image)
    <div class="row">
        <div><img src="{{asset('storage/'.$category->image)}}" alt="image"></div>
    </div>
    @endif
    <p>Name: {{$category->name}}</p>
    <p>url:<a href="/category/{{$category->url}}">{{$category->url}}</a></p>
    <br>
    <button><a href="/categories"> &lt Back</a></button>
    <button><a href="{{route('categories.edit', $category)}}">Edit</a></button>
    <button><a href="{{route('categories.delete', $category)}}">Delete</a></button>
</div>