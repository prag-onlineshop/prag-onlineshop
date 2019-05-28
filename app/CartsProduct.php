<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartsProduct extends Model
{  
    protected $table = 'carts_product';
    protected $primaryKey = 'id';

    public function product(){
        return $this->belongsTo(App\Product::class);
    }
    public function carts(){
        return $this->belongsTo(App\Carts::class);
    }
}
