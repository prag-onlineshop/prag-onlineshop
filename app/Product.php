<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    //
=======
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
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
}
