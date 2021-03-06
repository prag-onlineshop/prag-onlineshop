<?php

use App\Product;
use App\Category;
use App\Brand;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id'=>$faker->numberBetween($min = 1, $max = 20),
        'brand_id'=>$faker->numberBetween($min = 1, $max = 20),
        'name'=>$faker->word,
        'price'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10000),
        'description'=>$faker->sentence,
        'quantity'=>$faker->randomDigitNotNull
    ];
});
