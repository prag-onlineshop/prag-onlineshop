<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{
<<<<<<< HEAD
    protected $guarded = [];


    public function url(){

    	return url("/Coupons/{$this->id}". Str::slug($this->code). "/edit");
=======
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
>>>>>>> d27140aaa589bfedd19a8d9dbe9d3c7ec34bff80
    }
}
