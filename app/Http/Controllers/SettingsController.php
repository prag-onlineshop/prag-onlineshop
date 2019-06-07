<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\CarouselImage;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $set = new Setting();
        $settings = Setting::all();
        $carImgs = CarouselImage::all();
        return view('admin.setting.settings', compact('set','settings','carImgs'));
    }

    public function create()
    {
        // 
    }

    public function store(CarouselImage $carImgs)
    {
        $set = Setting::get();
        if($set->isEmpty()){
            $setting = Setting::create($this->validateRequest());
            $this->storeImage($carImgs);
        }else{
            $setting = Setting::first()->update($this->validateRequest());
            $this->storeImage($carImgs);
            // $images = array();
            // if(request()->has('carImg')){
            //     if($files=$request->file('carImg')){
            //         foreach($files as $file){
            //             $name = $file->getClientOriginalName();
            //             $file->move('carImg',$name);
            //             $images[] = $name;
            //         }
            //         Setting::first()->update( [
            //             'carImg'=>  implode("|",$images),
            //         ]);
            //     }
            // }
        }
    
        return redirect('admin/settings');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $carImg = CarouselImage::where('id', $id)->firstOrFail();
        $carImg->delete();
        return redirect('admin/settings');
    }
    // 
    private function validateRequest(){
        return request()->validate([
            'title'=> 'sometimes|min:3',
        ]);
    }
    //image upload
    private function storeImage($carImgs){
        if($files = request()->file('image')){
            $images = [];
            foreach($files as $file){
                $name = time() .'-'. $file->getClientOriginalName();
                $file->move('/images',$name);
                $images[] = $name;
            }
            for($i=0; $i<count($images); $i++){
            $carImgs->insert(array('image' => $images[$i]));
            }
        }
    }
}
