<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Product;

class Category extends Model
{
    use Sluggable;

    public function sluggable(){
        return[
            'url'=>[
                'source' => 'name'
            ]
        ];
    }

    protected $guarded = [];

<<<<<<< HEAD


}
=======
    public function products(){
        return $this->hasMany(Product::class);
    }
}
>>>>>>> 6bb5100b930e78b3285096a7112468d17122e9ad
