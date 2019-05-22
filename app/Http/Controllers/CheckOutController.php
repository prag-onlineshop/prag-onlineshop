<?php

namespace App\Http\Controllers;

use App\Carts;
use App\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('cart.checkout', compact('cartItems'));
    }

    public function addCheckOut(Request $request)
    {
        $this->validate($request,[
            'contact' => 'required|min:5|max:191',
            'address' => 'required|min:5|max:191',
        ]);

        $user_id = Auth::user()->id;

        User::where('id', $user_id)->update($request->except('_token'));
       
        Carts::createOrder();
        Cart::destroy();
        return view('user.thanksyou');
    }
}
