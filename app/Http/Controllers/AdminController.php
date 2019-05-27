<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(10);
        return view('admin.contentLayouts.CategoriesList', compact('categories'));
    }
    public function store(){
        $category = Category::create($this->validateRequest());
        $this->storeImage($category);
        return redirect('categoriesList-Admin')->with('add_message', $category->name.' added successfully');
    }
    public function update(Category $category){
        $category->update($this->validateRequest());
        $category->url = Str::slug($category->name,'-');
        $category->save();
        return redirect('categoriesList-Admin/'.$category->url)->with('update_message', $category->name.' successfully updated');
    }
    public function destroy(Category $category){
        $this->deleteImage($category);
        $category->delete();
        return redirect('CategoriesList-Admin')->with('del_message','Item successfully deleted');
    }

    private function validateRequest(){
        return request()->validate([
            'name'=> 'required|min:3',
            'image'=> 'sometimes|file|image|max:3000',
        ]);
    }
//image upload
    private function storeImage($category){
        if(request()->has('image')){
            $category->update([
                'image' => request()->image->store('categoryImages', 'public'),
            ]);
            $image = Image::make(public_path('storage/'.$category->image))->fit(300,300);
            $image->save();
        }
    }
//image delete
    private function deleteImage($category){
        $category = Category::findOrFail($category->id);
        $image_path = public_path('storage/'.$category->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
}
