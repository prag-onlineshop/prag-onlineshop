<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Coupon;

class CouponsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stored(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        // dd($coupon);
        if (!$coupon) {
            return redirect('cart')->withErrors('Invalid coupon code. Please try again.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'type' => $coupon->type,
            'amount' => $coupon->amount,
            'discount' => $coupon->discount(Cart::subtotal()),
        ]);

        return redirect('cart')->with('success_message', 'Coupon has been applied');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return redirect('cart')->with('success_message', 'Coupon has been removed.');
    }
}
