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

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
      
          $dataList = Brand::latest()->get();
          return Datatables::of($dataList)
                  ->addColumn('action', function($data){
                      $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$data->id.'" data-original-title="Edit" name="edit" class="edit btn btn-primary btn-sm editCategory text-white">    <i class="fa fa-edit blue"></i> </a>';
     
                      $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" name="delete"  data-id="'.$data->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm text-white">   <i class="fa fa-trash red"></i></a>';
  
                       return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
              
      }
      return view('admin.contentLayouts.BrandCrud', compact('brands'));
      }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        if($files == NULL){
            $new_name = '../imgBrand/default_img.jpg';
          } else {
            $new_name = $files->getClientOriginalName();
            $files->move(public_path('storage'), $new_name);
          }
        $form_data = array(
            'name'           =>  $request->name,
            'url'            =>  $request->url,
            'image'          =>  $new_name,
           
      );
      Brand::create($form_data);
      return response()->json(['success'=>'Data saved successfully.']);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    private function storeImage($brand){
        $brand->update([
            'image' => request()->image->store('categoryImages', 'public'),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Brand::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
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
        // Get Image name and Upload in DB using Image Intervention
        if($image == NULL){
            $new_name = $image_name;
          } else {
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('storage'), $new_name);
          }
        $form_data = array(
            'name'       =>   $request->name,
            'url'        =>   $request->url,
            'image'       =>   $new_name
        );

           Brand::whereId($request->hidden_id)->update($form_data);
           return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        $data->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]); 
    }
    //image delete
    private function deleteImage($brand){
        $brand = Brand::findOrFail($brand->id);
        $image_path = public_path('storage/'.$brand->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
}
