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

        return view('user.userprofile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:191',
            'email' => 'required|min:5|email|max:191',
            'contact' => 'required|min:5|max:191',
            'address' => 'required|min:5|max:191',
            'photo' => 'image|mimes:png,jpg,jpeg,|max:10000'
        ]);

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
