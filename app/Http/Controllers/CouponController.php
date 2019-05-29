<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{

	public function index(){

		$coupons = Coupon::all();

		return view('admin.coupon.index', compact('coupons'));


	}

    public function create(){

    	$coupon = new Coupon();
    	return view('admin.coupon.addCoupon', compact('coupon'));
    }

    public function store(){

   		$data = Coupon::create($this->validateRequest());
   		
   		return redirect('Coupons');
    }

    private function validateRequest(){

    	return request()->validate([
    		'name' => 'required|alpha_num',
    		'code' => 'required|alpha_num',
    		'type' => '',
    		'amount' => 'required|numeric',

    		]);
    }

    public function edit($slug){
                $coupon = Coupon::where('code', $slug)->firstOrFail();    
        return view('admin.coupon.edit', compact('coupon'));

    }
//Coupon $coupon,compact('coupon')
    public function show($slug){
        $coupon = Coupon::where('code', $coupon)->firstOrFail();

    	return view('admin.coupon.profile', compact('coupon'));

    }

    public function destroy(Coupon $coupon){
        $coupon->delete();
        return redirect('Coupons');
    }

    public function update(Coupon $coupon){
        $coupon->update($this->validateRequest());

        return redirect('Coupons');
    }

}
