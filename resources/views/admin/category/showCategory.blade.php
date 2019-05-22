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
    <p>Url: {{$category->url}}</p>
    <button><a href="/categories"> &lt Back</a></button>
    <button><a href="/categories/{{$category->url}}/edit">Edit</a></button>
    <button><a href="/categories/{{$category->url}}/delete">Delete</a></button>
</div>