<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\CartsProduct;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
//------------------------------------------------- ADMIN PAGE ---------------------------------------
    public function index(){
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderBy('name', 'asc')->paginate(10);
        return view('admin.product.indexProduct', compact('products', 'categories', 'brands'));
    }
    public function create(){
        $product = new Product();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.createProduct', compact('product', 'categories', 'brands'));
    }
    public function store(Product $product){
        $this->validateRequest();
        $this->storeRequest($product);
        $this->storeImage($product);
        return redirect('/products')->with(' add_message', $product->name.' added successfully');
    }
    public function show(Product $product, Category $category, Brand $brand){
        $price_format = number_format($product->price, 2, '.', ',');
        $product->price = $price_format;
        return view('admin.product.showProduct', compact('product', 'category', 'brand'));
    }
    public function edit(Product $product){
        $categories = Category::all();
        $brands = Brand::all();
        $price_format = number_format($product->price, 2, '.', ',');
        $product->price = $price_format;
        return view('admin.product.editProduct', compact('product', 'categories', 'brands'));
    }
    public function update(Product $product, Category $category, Brand $brand){
        $this->validateRequest();
        $this->storeRequest($product);
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
            'price'=> ['required','not_in:0.00','regex:/^\d{1,3}(?:,\d{3}|\d+)*(?:\.\d+)?$/'],
            'description'=> 'required|max:300',
            'quantity'=> 'required|numeric',
        ]);
    }
    private function storeRequest($product){
        $product->category_id = request('category_id');
        $product->brand_id = request('brand_id');
        $product->name = request('name');

        $price= request('price');
        $price_format = str_replace(',','',$price);
        $product->price = $price_format;

        $product->description = request('description');
        $product->quantity = request('quantity');

        $product->save();
    }

    public function productSearch(Request $request){
        $search = $request->get('search');
        $products = Product::where('name','like','%'.$search.'%')->paginate(10);
        return view('admin.product.indexProduct',['products' => $products]);
    }
//image upload
    private function storeImage($product){
        if(request()->has('image')){
            $product->update([
                'image' => request()->image->store('productImages', 'public'),
            ]);
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
//--------------------------------------------------- HOME PAGE ------------------------------------------------------------
    //landing page
    public function indexHome(){
        $product_list = Product::where('quantity', '!=', 0)
        ->where('category_id','!=','')
        ->where('brand_id','!=','')
        ->get();
        $cartItems = Cart::content();
        $cart_products = CartsProduct::groupBy('product_id')->selectRaw('sum(qty) as sum, product_id')->orderBy('sum','desc')->get();
        $products = Product::with('category','brand')->where('quantity', '!=', 0)->latest()->paginate(8);
        return view('user.content', compact('cartItems','products','product_list','cart_products'));
    }
    // category filter for product
    public function showCates($cat)
    {   
        $cat_url = Category::where('url',$cat)->firstOrFail();
        $category_products = Product::where('category_id', $cat_url->id)
        ->where('brand_id','!=','')
        ->where('quantity', '!=', 0)
        ->get();
        $id_ = $cat_url->id;
        $cartItems = Cart::content();
        return view('user.CategoryFilter', compact('cartItems','category_products', 'id_'));
    }

    //brand products
    public function productBrand($brand){
        $brand = Brand::where('name',$brand)->firstOrFail();
        $brand_products = Product::where('brand_id', $brand->id)
        ->where('category_id','!=','')
        ->where('quantity', '!=', 0)
        ->get();
        $brand_id = $brand->id;
        $cartItems = Cart::content();
        return view('user.BrandFilter', compact('cartItems','brand_products', 'brand_id'));
    }

    //search products
    public function itemSearch(Request $request){
        $search = $request->get('search');
        $products = Product::where('name','like','%'.$search.'%')
        ->where('category_id','!=','')
        ->where('brand_id','!=','')
        ->where('quantity', '!=', 0)
        ->paginate(10);
        $relProducts = Product::get();
        $categories = Category::get();
        $brands = Brand::get();
        $cartItems = Cart::content();
        return view('user.productSearch',['products' => $products], compact('search','relProducts','cartItems','brands','categories'));
    }
}
