<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Brand;
use Intervention\Image\Facades\Image;
use DataTables;
use Validator;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
      if ($request->ajax()) {
      
          $dataList = Category::latest()->get();
          return Datatables::of($dataList)
                  ->addColumn('action', function($data){
                      $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$data->id.'" data-original-title="Edit" name="edit" class="edit btn btn-primary btn-sm editCategory text-white">Edit</a>';
     
                      $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" name="delete"  data-id="'.$data->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm text-white">Delete</a>';
  
                       return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
              
      }
      return view('admin.contentLayouts.CategoryCrud', compact('categories'));
     
    }
  
  
      // Insert Data
      public function store(Request $request, Product $product)
      {
  

    
       
          $rules = array(
              'name'=> 'unique:categories|required|min:3',
              'url' => 'required',
              'image'=> 'sometimes|file|image',
          );
  
          $error = Validator::make($request->all(), $rules);
  
          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }


          $files = $request->file('image');
          if($files == NULL){
            $new_name = '../imgCategory/default_img.jpg';
          } else {
            $new_name = $files->getClientOriginalName();
            $files->move(public_path('storage'), $new_name);
          }
          
          $form_data = array(
              'name'           =>  $request->name,
              'url'            =>  $request->url,
              'image'          =>  $new_name,
             
        );
        Category::create($form_data);
        // $category = Category::create($form_data);
        // $this->storeImage($category);
          return response()->json(['success'=>'Data saved successfully.']);    
              
      }
  
  
      public function show($id)
      {
          //
      }
  
      // Update Data
      public function edit($id)
      {
          if(request()->ajax())
          {
              $data = Category::findOrFail($id);
              return response()->json(['data' => $data]);
          }
      }
  
      // Delete Data 
      public function destroy($id)
      {
          $data = Category::findOrFail($id);
          $data->delete();
          return response()->json([
              'success' => 'Record has been deleted successfully!'
          ]); 
      }
  
  
      private function validateRequest(){
          return request()->validate([
              'name'=> 'required|min:3',
              'image'=> 'sometimes|file|image',
              'url' => 'required'
          ]);
     
      }
  
      public function update(Request $request, Category $category)
      {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'name'    =>  'required',
                'url'     =>  'required',
                'image'    =>  'image'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }
        else
        {
            $rules = array(
                'name'    =>  'required',
                'url'     =>  'required',
            
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }
    
        if($image == NULL){
            $new_name = $image_name;
          } else {
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('storage'), $new_name);
          }
        // Get Image name and Upload in DB using Image Intervention
        // $image_name = $image->getClientOriginalName();
        // $image->move(public_path('storage'), $image_name);

        $form_data = array(
            'name'       =>   $request->name,
            'url'        =>   $request->url,
            'image'       =>   $new_name
        );

      Category::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data is successfully updated']);
      }
  
  
  
  
      private function storeImage($category){
              $category->update([
                  'image' => request()->image->store('categoryImages', 'public'),
              ]);
      
      }
  
      private function deleteImage($category){
          $category = Category::findOrFail($category->id);
          $image_path = public_path('storage/'.$category->image);
          if(file_exists($image_path)){
              unlink($image_path);
          }
      }

      
}
