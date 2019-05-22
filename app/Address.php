<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $id = 'id';
    protected $fillable = [
        'address',
        'contact',
        'payment_type',
        'user_id',
    ];
}
