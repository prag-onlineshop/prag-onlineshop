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


class AdminController extends Controller
{

  public function index(Request $request)
  {
    if ($request->ajax()) {
    
        $dataList = Category::latest()->get();
        return Datatables::of($dataList)
                ->addColumn('action', function($data){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$data->id.'" data-original-title="Edit" name="edit" class="edit btn btn-primary btn-sm editCategory">Edit</a>';
   
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" name="delete"  data-id="'.$data->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</a>';

                     return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            
    }
    return view('layouts.adminLayout', compact('categories'));
    }


    // Insert Data
    public function store(Request $request)
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
      
        $new_name = $files->getClientOriginalName();
        $form_data = array(
            'name'           =>  $request->name,
            'url'            =>  $request->url,
            'image'          =>  $new_name,
      );
     
      $category = Category::create($form_data);
      $this->storeImage($category);
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
                'url'     =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'name'       =>   $request->name,
            'url'        =>   $request->url,
            'image'            =>   $image_name
        );

        Category::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data is successfully updated']);


    }




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

}




//   private function storeImage($category){
//     if(request()->has('image')){
//         $category->update([
//             'image' => request()->image->store('categoryImages', 'public'),
//         ]);
//         $image = Image::make(public_path('storage/'.$category->image))->fit(300,300);
//         $image->save();
//     }
// }

