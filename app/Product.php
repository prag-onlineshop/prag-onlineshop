<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Category;
use App\CartsProduct;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function carts_product(){
        return $this->hasMany(CartsProduct::class);
    }
}
