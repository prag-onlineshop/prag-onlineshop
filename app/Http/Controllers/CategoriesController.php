<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    public function url($category){
        $category = Category::where('url', $category)->firstOrFail();
        return view('category.urlCategory', compact('category'));
    }
    public function index(){

        $categories = Category::all();

        return view('admin.contentlayouts.categoriesList', compact('categories'));
    }
    public function create(){
        $category = new Category();
        return view('category.createCategory', compact('category'));
    }
    public function store(){
        $category = Category::create($this->validateRequest());
        $this->storeImage($category);

        return redirect('categories')->with('add_message', 'added successfully');;
    }
    public function show(Category $category){
       
        return view('admin.contentLayouts.CategoriesList', compact('category'));
    }
    public function edit(Category $category){
        return view('category.editCategory', compact('category'));
    }
    public function update(Category $category){
        $category->update($this->validateRequest());
        $this->storeImage($category);
        
        return redirect('categories/'.$category->id)->with('update_message', 'successfully updated');
    }
    public function delete(Category $category){
        return view('category.deleteCategory', compact('category'));
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
