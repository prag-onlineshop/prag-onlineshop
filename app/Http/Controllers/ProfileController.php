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
        // $user_id = Auth::user()->id;
        // User::where('id', $user_id)->update($request->except('_token'));

        // return back()->with('msg', 'Your Profile Detail has been update');

        //
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('images/' . $filename ) );

            // $user = Auth::user();
            // $user->avatar = $filename;
            // $user->save();

            $user_id = Auth::user()->id;
            $user_id->avatar = $filename;
            $user->save();

            User::where('id', $user_id)->image('image')->update($request->except('_token'));
        }

        // return view('user.home', array('user' => Auth::user()));

        return back()->with('msg', 'Your Profile Detail has been update');
    }
}
