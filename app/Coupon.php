<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
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
