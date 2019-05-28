<?php

namespace App\Http\Controllers;

use App\Carts;
use App\User;
use App\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        // return view('cart.checkout', compact('cartItems'));

        // $discount = session()->get('coupon')['discount'] ?? 0;
        // $newSubtotal = (Cart::subtotal() - $discount);
        // $newTotal = $newSubtotal * (1);

        return view('cart.checkout')->with([
            'amount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
            'cartItems' => $cartItems
        ]);
    }

    private function getNumbers()
    {
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal(2,'.','') - $discount);
        $newTotal = $newSubtotal * (1);

        return collect([
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
        ]);
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
