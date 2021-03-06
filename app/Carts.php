<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Carts extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'total',
        'status',
        'user_id'
    ];

    public function orderFields()
    {
        // order can order many product from Product Table
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder()
    {   
        $discount = session()->get('coupon')['discount'] ?? 0;
        $dist = str_replace(',','',$discount);
        $newSubtotal = (Cart::total(2,'.','') - $dist);
        $newTotal = $newSubtotal * (1);

        $user = Auth::user();
        //$order = $user->orders()->create(['total' => Cart::total(), 'status'=>'pending']);
        $order = $user->orders()->create(['total' => $newTotal, 'status' => 'pending']);
        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, 
                ['qty'=>$cartItem->qty, 'tax'=>Cart::tax(),'total'=>$cartItem->qty*$cartItem->price]);
        }
    }

    public function users()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function carts_product()
    {
        return $this->hasMany(CartsProduct::class, 'carts_id');
    }

    public function statusOptions(){
        return [
            'Pending' => 'Pending',
            'Shipped' => 'Shipped',
            'Paid' => 'Paid'
        ];
    }
}
