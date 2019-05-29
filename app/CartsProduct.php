<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartsProduct extends Model
{  
    protected $table = 'carts_product';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function carts()
    {
        return $this->belongsTo(Carts::class, 'carts_id');
    }
}
