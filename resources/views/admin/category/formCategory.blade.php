<div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{old('name') ?? $category->name}}">
    <div>{{$errors->first('name')}}</div>
</div>
<div>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*" value="{{old('image') ?? $category->image}}">
    <div>{{$errors->first('image')}}</div>
</div>