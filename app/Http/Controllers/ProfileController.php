<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = User::where('id', $user_id)->get();

        return view('user.home', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        if($request->photo){
            $name = time() . '.' . $request->photo->getClientOriginalExtension();

            Image::make($request->photo)->save(public_path('images/' ).$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('images/');
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            $user_id = Auth::user()->id;
            $user = User::where('id', $user_id)->update($request->except('_token'));
            $user = Auth::user();
            $user->photo = $name;
    		$user->save();
        }

        return back()->with('msg', 'Your Profile Detail has been update');
    }
}
