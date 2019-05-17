<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'quantity',
        'category_id'
    ];
}
