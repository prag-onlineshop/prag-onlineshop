<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{

    protected $guarded = [];


    public function url(){

    	return url("/Coupons/" . Str::slug($this->code). "/edit");
    }

    public function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if($this->type = 'flat'){
            return $this->amount;
        } elseif ($this->type = 'percent') {
            return ($this->amount / 100) * $total;
        } else {
            return 0;
        }

    }
}
