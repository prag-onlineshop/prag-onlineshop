<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Brand;
use DataTables;
use Validator;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
      if ($request->ajax()) {
        $categories = Category::all();
        $brands = Brand::all();
          $dataList = Product::latest()->get();
          return Datatables::of($dataList)
                  ->addColumn('action', function($data){
                      $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$data->id.'" data-original-title="Edit" name="edit" class="edit btn btn-primary btn-sm editCategory text-white"><i class="fa fa-edit blue"></i></a>';
                      $btn = $btn.' <span><a href="javascript:void(0)" data-toggle="tooltip" name="delete"  data-id="'.$data->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm text-white"><i class="fa fa-trash red"></i></a></span>';
  
                       return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
              
      }
      return view('admin.contentLayouts.productsCrud', compact('products', 'categories', 'brands'));
     
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
   
    public function store(Request $request,Product $product)
    {

        $this->validateRequest();

        $price= request('price');
        $price_format = str_replace(',','',$price);
        $product->price = $price_format;

        $files = $request->file('image');
          if($files == NULL){
            $new_name = '../imgProduct/default_img.jpg';
          } else {
            $new_name = $files->getClientOriginalName();
            $files->move(public_path('storage'), $new_name);
          }
          
          $form_data = array(
              'category_id'    =>  $request->category_id,
              'brand_id'       =>  $request->brand_id,
              'name'           =>  $request->name,
              'image'          =>  $new_name,
              'price'          =>  $price_format,
              'description'    =>  $request->description,
              'quantity'       => $request->quantity,
             
        );
        Product::create($form_data);
       
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
            $data = Product::findOrFail($id);
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
    public function update(Request $request, Product $product)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'category_id'=>'required',
                'brand_id'=>'required',
                'name'=> 'required|min:3',
                'image'=> 'sometimes|file|image|max:3000',
                'price'=> ['required','not_in:0.00','regex:/^\d{1,3}(?:,\d{3}|\d+)*(?:\.\d+)?$/'],
                'description'=> 'required|max:300',
                'quantity'=> 'required|numeric',
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

          $price= request('price');
          $price_format = str_replace(',','',$price);
          $product->price = $price_format;

        $form_data = array(
            'category_id'    =>  $request->category_id,
            'brand_id'       =>  $request->brand_id,
            'name'           =>  $request->name,
            'image'          =>  $new_name,
            'price'          =>  $price_format,
            'description'    =>  $request->description,
            'quantity'       =>  $request->quantity,
        );

      Product::whereId($request->hidden_id)->update($form_data);
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
        $data = Product::findOrFail($id);
        $data->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]); 
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

}
