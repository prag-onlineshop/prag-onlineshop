<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $products = Product::with('brand', 'category')->get();

        $user = Auth::user();

        return view('cart.index')->with([
            'amount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
            'cartItems' => $cartItems
        ])->with(compact('user', 'cartItems', 'products'));
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

    public function addItem($id)
    {
        if(Auth::check()){
            $product = Product::findOrFail($id);
            Cart::add($id, $product->name, 1, $product->price,['img'=>$product->image,'quantity'=>$product->quantity]);
            $product->quantity -= 1;
            $product->save();
            return back()->with('status', 'added '. $product->name .' to your cart');
        } else {
            return redirect('userLogin');
        }
    }

    public function update(Request $request, $id)
    {
        $proID = $request->proId;
        $product = Product::findOrFail($proID);
        
        $new_qty = $request->new_qty;
        $old_qty = $request->old_qty;
        $prod_qty = $product->quantity;
        $quantity = $prod_qty + $old_qty;
        $product->quantity = $quantity;
        

        if($new_qty <= $product->quantity) {
            $prod_qty = $product->quantity;
            $product->quantity = $prod_qty - $new_qty;
            $product->save();

            Cart::update($id, $new_qty);          
            return back()->with('status', 'Cart is updated');
        } else {
            return back()->with('error', 'Please check your quantity');
        }
    }

    public function destroy(Request $request, $id)
    {
        $prod_id = $request->prod_id;
        $product = Product::findOrFail($prod_id);
        $qty = $request->qty;
        $qty_prod = $product->quantity;
        $back_qty = $qty + $qty_prod;
        $product->quantity = $back_qty;
        $product->save();

        Cart::remove($id);
        return back();
    }

    public function detailPro($id)
    {
        $products = Product::with('category','brand')->where('id', $id)->get();
        $cartItems = Cart::content();
        $brands = Brand::all();
        $productList = Product::all();
        return view('user.productDetail', compact( 'cartItems','products', 'brands', 'productList'));
    }   
}
