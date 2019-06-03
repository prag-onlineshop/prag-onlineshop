<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class AdminCouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Coupon::latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'code' => 'required|string|max:191',
            'type' => 'required|string|max:191',
            'amount' => 'required|max:191',
        ]);

        Coupon::create([
            'name' => $request['name'],
            'code' => $request['code'],
            'type' => $request['type'],
            'amount' => $request['amount'],
        ]);

        return ['message' => 'Added the user info'];

        // return Coupon::create($this->validateRequest());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Coupon::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'code' => 'required|string|max:191',
            'type' => 'required|string|max:191',
            'amount' => 'required|string|max:191',

        ]);

        $user->update($request->all());

        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Coupon::findOrFail($id);

        //delete the user

        $user->delete();

        return ['message' => 'User Deleted'];
    }
}
