<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function url($category){
        $category = Category::where('url', $category)->firstOrFail();
        return view('admin.category.urlCategory', compact('category'));
    }
    public function index(){

        $categories = Category::all();

        // return view('admin.contentlayouts.categoriesList', compact('categories'));
        return view('admin.contentLayouts.CategoriesList', compact('categories'));
    }
    public function create(){
        $category = new Category();
        return view('admin.category.createCategory', compact('category'));
    }
    public function store(){
        $category = Category::create($this->validateRequest());
        $this->storeImage($category);

        return redirect('categories')->with('add_message', ' added successfully');
    }
    public function show($category){
        $category = Category::where('url', $category)->firstOrFail();
        return view('admin.category.showCategory', compact('category'));
    }
    public function edit($category){
        $category = Category::where('url', $category)->firstOrFail();
        return view('admin.category.editCategory', compact('category'));
    }
    public function update(Category $category){
        $category->update($this->validateRequest());
        $category->url = Str::slug($category->name,'-');
        $category->save();
        return redirect('categories/'.$category->url)->with('update_message', 'successfully updated');
    }
    public function delete($category){
        $category = Category::where('url', $category)->firstOrFail();
        return view('admin.category.deleteCategory', compact('category'));
    }
    public function destroy(Category $category){
        $this->deleteImage($category);
        $category->delete();
        return redirect('categories')->with('del_message','successfully deleted');
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
