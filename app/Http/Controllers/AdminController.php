<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Brand;
use App\Carts;
use App\CartsProduct;
use Intervention\Image\Facades\Image;
use DataTables;
use Validator;


class AdminController extends Controller
{
    public function index(){
        $categories = Category::oldest()->paginate(10);
        return view('admin.contentLayouts.CategoriesList', compact('categories'));
    }
    public function store(){
        $category = Category::create($this->validateRequest());
        $this->storeImage($category);
        return redirect('categoriesList-Admin')->with('add_message', ' added successfully');
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
        return redirect('CategoriesList-Admin')->with('del_message','successfully deleted');
    }


    private function validateRequest(){
        return request()->validate([
            'name'=> 'required|min:3',
            'image'=> 'sometimes|file|image',
            'url' => 'required'
        ]);
    }

    // public function update(Request $request, Category $category)
    // {
    //     $image_name = $request->hidden_image;
    //     $image = $request->file('image');
    //     if($image != '')
    //     {
    //         $rules = array(
    //             'name'    =>  'required',
    //             'url'     =>  'required',
    //             'image'    =>  'image'
    //         );
    //         $error = Validator::make($request->all(), $rules);
    //         if($error->fails())
    //         {
    //             return response()->json(['errors' => $error->errors()->all()]);
    //         }
    //     }
    //     else
    //     {
    //         $rules = array(
    //             'name'    =>  'required',
    //             'url'     =>  'required'
    //         );

    //         $error = Validator::make($request->all(), $rules);

    //         if($error->fails())
    //         {
    //             return response()->json(['errors' => $error->errors()->all()]);
    //         }
    //     }

    //     $form_data = array(
    //         'name'       =>   $request->name,
    //         'url'        =>   $request->url,
    //         'image'            =>   $image_name
    //     );

    //     Category::whereId($request->hidden_id)->update($form_data);
    //     return response()->json(['success' => 'Data is successfully updated']);


    // }




    private function storeImage($category){
        if(request()->has('image')){
            $category->update([
                'image' => request()->image->store('categoryImages', 'public'),
            ]);
            $image = Image::make(public_path('storage/'.$category->image))->fit(300,300);
            $image->save();
        }
    }

    private function deleteImage($category){
        $category = Category::findOrFail($category->id);
        $image_path = public_path('storage/'.$category->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }

    public function orders()
    {
        $orders = Carts::with('users', 'carts_product.products')->orderBy('id','desc')->get();
        
        // return response()->json([
        //     'orders'=>$orders
        // ],200);
        return view('admin.order.ordersIndex', compact('orders'));
    }

    public function ordersId($id)
    {
        $orders = Carts::with('users', 'carts_product.products')->where('id', $id)->get();
        return view('admin.order.ordersId', compact('orders'));
    }
}



