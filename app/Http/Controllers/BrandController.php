<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name','asc')->paginate(100);
        return view('admin.brand.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return view('admin.brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $brand = Brand::create($this->validateRequest());

        $this->storeImage($brand);

        return redirect('brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $brand = Brand::where('name', $slug)->firstOrFail();
        return view('admin.brand.profile', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {    
        $brand = Brand::where('name', $slug)->firstOrFail();
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Brand $brand)
    {
        $brand->update($this->validateRequest());           
        $this->storeImage($brand);
        return redirect('brand');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('brand');
    }

    private function storeImage($brand){

        if(request()->has('logo')){
            $brand->update([
                'logo' => request()->logo->store('uploads','public'),
            ]);
        }
    }

    private function validateRequest(){

        return tap(request()->validate([
            'name' => 'required',
            'logo' => '',

        ]), function () {
                   
            if(request()->hasFile('logo')){
                request()->validate([
                'logo' => 'file|image|max:50000',
            ]);
            };
        });
    }


}
