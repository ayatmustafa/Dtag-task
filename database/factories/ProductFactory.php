<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(3),
        'purchase_price'=>$faker->randomNumber(2),
        'sale_price'=>$faker->randomNumber(2),
        'stock'=>$faker->randomNumber(2),
    ];
});
