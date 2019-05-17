<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Cviebrock\EloquentSluggable\Sluggable;

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
=======

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
}
