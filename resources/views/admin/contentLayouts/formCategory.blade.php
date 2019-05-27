    <div>
        <label for="name">Name:</label>
        <input type="text" class="input-control" name="name" id="name">
        <div>{{$errors->first('name')}}</div>
    </div>
    <div>
        <label for="image">Image:</label>
        <input type="file" class="input-control" name="image" accept="image/*" id="image" accept="image/*">
        <div>{{$errors->first('image')}}</div>
    </div>