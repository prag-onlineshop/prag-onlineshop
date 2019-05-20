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
                <th>{{$category->name}}</th>
                <th><button><a href="{{route('categories.show', $category)}}">Details</a></button></th>
            </tr>
            @endforeach
        </tbody>
    </table>  
    <br>
    {{$categories->links()}}
</div>
