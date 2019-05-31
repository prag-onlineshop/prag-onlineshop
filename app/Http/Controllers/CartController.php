<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $products = Product::with('brand', 'category')->get(); 
        return view('cart.index', compact('cartItems', 'products'));  
    }

    public function addItem($id)
    {
        if(Auth::check()){
            $product = Product::findOrFail($id);
            // 1 add one time only 1 to Cart
            // if($product->id == $id){
            //     Cart::update($id, 1);
            // }else{
                Cart::add($id, $product->name, 1, $product->price,['img'=>$product->image,'quantity'=>$product->quantity]);
            // }
            $product->quantity -= 1;
            $product->save();
            return back()->with('status', 'added 1 item to your cart');
        } else {
            return redirect('userLogin');
        }
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proID = $request->proId;
        $product = Product::findOrFail($proID);
        $quantity = $product->quantity;

        if($qty<$quantity) {
            Cart::update($id, $request->qty);
            return back()->with('status', 'Cart is updated');
        } else {
            return back()->with('error', 'Please check your quantity');
        }
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }

    public function detailPro($id)
    {
        $products = Product::with('category','brand')->where('id', $id)->get();
        return view('user.productDetail', compact('products'));
    }   
}
