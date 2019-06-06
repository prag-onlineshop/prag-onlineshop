<?php

namespace App\Http\Controllers;

use App\Carts;
use App\User;
use App\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckOutMail;
use App\CartsProduct;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $user = Auth::user();
        $userAdd = User::get();

        return view('cart.checkout', compact('cartItems'))
        ->with(['amount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
            'cartItems' => $cartItems
        ])->with(compact('user','userAdd'));
    }

    private function getNumbers()
    {
        $discount = session()->get('coupon')['discount'] ?? 0;
        // $newSubtotal = (Cart::subtotal(2,'.','') - $discount);
        $dist = str_replace(',','',$discount);
        $newSubtotal = (Cart::subtotal(2,'.','') - $dist);
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

        $user = Auth::user();   
        // $order = $user->orders()->get(); //cart

        $products = Cart::content();
        $total = Cart::total();

        $discount = session()->get('coupon')['discount'] ?? 0;
        $dist = str_replace(',','',$discount);
        $newSubtotal = (Cart::subtotal(2,'.','') - $dist);
        $newTotal = $newSubtotal * (1);

        $user_id = Auth::user()->id;
        User::where('id', $user_id)->update($request->except('_token'));
        $name = User::where('id', $user_id)->first();
        $carts = Carts::where('user_id',$user_id)->get();
        Carts::createOrder();
        Cart::destroy();

        //send email // 
        // Mail::to($name->email)->send(new CheckOutMail($name, $products, $total, $discount, $newTotal));
        return view('user.thanksyou');
    }
}
