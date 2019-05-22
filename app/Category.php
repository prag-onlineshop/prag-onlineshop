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

    public function products(){
        return $this->hasMany(Product::class);
    }
}
