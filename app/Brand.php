<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Support\Str;


class Brand extends Model
{
    protected $guarded = [];

    public function url(){

    	return url("/brand/" . Str::slug($this->name));
    }


    public function products(){
        return $this->hasMany(Product::class);
    }
}
