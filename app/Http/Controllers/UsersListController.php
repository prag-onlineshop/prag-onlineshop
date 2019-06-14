<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersListController extends Controller
{
    //
    public function index(){

    	$usersList = User::all();

    	return view('admin.dashboard.usersList', compact('usersList'));

    }

    public function update(Request $request){

    	$user = User::findOrFail($request->userid);
    	dd($user);
    	// $data->update($this->validateRequest());

    	return back();


    }

    private function validateRequest(){
        return request()->validate([
            'name'=>'required',
            'email'=>'required|regex:/^.+@.+$/i',
            'type' => 'required',
        ]);
    }

}
