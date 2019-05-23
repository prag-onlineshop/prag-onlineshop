<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function indexHome(){
        $products = Product::orderBy('name', 'asc')->paginate(8);
        return view('user.content', compact('products'));
    }

    public function index(){
        $products = Product::orderBy('name', 'asc')->paginate(10);
        return view('admin.product.indexProduct', compact('products'));
    }
    public function create(){
        $product = new Product();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.createProduct', compact('product', 'categories', 'brands'));
    }
    public function store(){
        $product = Product::create($this->validateRequest());
        $this->storeImage($product);

        return redirect('/products')->with('add_message', $product->name.' added successfully');
    }
    public function show(Product $product, Category $category, Brand $brand){
        return view('admin.product.showProduct', compact('product', 'category', 'brand'));
    }
    public function edit(Product $product){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.editProduct', compact('product', 'categories', 'brands'));
    }
    public function update(Product $product, Category $category, Brand $brand){
        $product->update($this->validateRequest());
        $this->storeImage($product);

        return redirect('products/'.$product->id)->with('update_message', $product->name.' updated successfully');
    }
    public function delete(Product $product, Category $category, Brand $brand){
        return view('admin.product.deleteProduct', compact('product', 'category', 'brand'));
    }
    public function destroy(Product $product, Category $category, Brand $brand){
        $this->deleteImage($product);
        $product->delete();
        return redirect('products')->with('del_message', 'product deleted');
    }

    private function validateRequest(){
        return request()->validate([
            'category_id'=>'required',
            'brand_id'=>'required',
            'name'=> 'required|min:3',
            'image'=> 'sometimes|file|image|max:3000',
            'price'=> 'required|numeric|between:1.00,999999.99',
            'description'=> 'required|max:300',
            'quantity'=> 'required|numeric|min:1',
        ]);
    }
//image upload
    private function storeImage($product){
        if(request()->has('image')){
            $product->update([
                'image' => request()->image->store('productImages', 'public'),
            ]);
            $image = Image::make(public_path('storage/'.$product->image));
            $image->save();
        }
    }
//image delete
    private function deleteImage($product){
        $product = Product::findOrFail($product->id);
        $image_path = public_path('storage/'.$product->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }

    // category filter for product
    public function showCates($id)
    {
        $category_products = Product::where('category_id', $id)->get();
        $id_ = $id;
        return view('user.CategoryFilter', compact('category_products', 'id_'));
    }
}
