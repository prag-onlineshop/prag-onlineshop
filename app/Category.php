<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
}
