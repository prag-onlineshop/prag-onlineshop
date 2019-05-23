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
    	return view('admin.coupon.addCoupon');
    }

    public function store(){

   		$data = Coupon::create($this->validateRequest());
   		//dd($data);
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
}
