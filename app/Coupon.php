<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{

    protected $guarded = [];

    protected $fillable = [
        'name', 'code', 'type', 'amount'
    ];


    public function url(){

    	return url("/Coupons/" . Str::slug($this->code). "/edit");
    }

    public function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if($this->type == 'percent'){
            $amount = $this->amount;
            $total_t = str_replace(',','',$total);
            $comp_amt = $amount/100 * $total_t;
            $amt = number_format($comp_amt, 2, '.', ',');
            $this->amount = $amt;
            return $this->amount;

        }elseif($this->type == 'flat'){
            $amount = $this->amount;
            $this->amount = number_format($amount, 2, '.', ',');
            return $this->amount;
        } else {
            return 0;
        }
    }
}
