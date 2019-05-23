@if(session()->has('del_message'))
<div id="delete-success" role="alert">
    <strong>{{session()->get('del_message')}}</strong>
    <br>
</div>
@elseif(session()->has('add_message'))
<div id="delete-success" role="alert">
    <strong>{{session()->get('add_message')}}</strong>
    <br>
</div>
@endif
<div id="category">
    <button><a href="/categories/create">Add Category</a></button>
    <br>
    <table>
        <thead>
            <tr>
                <th>Categories</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th> @if($category->image)
                    <div class="row">
                        <div><img src="{{asset('storage/'.$category->image)}}" alt="image" width="50px" height="50px">
                        </div>
                    </div>
                    @endif</th>
                <th>{{$category->name}}</th>
                <th><button><a href="/categories/{{$category->url}}">Details</a></button></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
   {{$categories->links()}}
</div>