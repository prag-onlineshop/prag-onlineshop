<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{
    protected $guarded = [];


    public function url(){

    	return url("/Coupons/{$this->id}". Str::slug($this->code). "/edit");
    }
}
