<?php

use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'code' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
        'type' => $faker->randomElement(['flat','percent']),
        'amount' => $faker->numberBetween($min = 5, $max = 100),
    ];
});
