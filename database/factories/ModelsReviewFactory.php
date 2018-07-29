<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'product_id' => function(){
            return Product::all()->random();
        },
        'customer' => $faker->word,
        'review' => $faker->paragraph,
        'rating' => $faker->numberBetween(1,5)
    ];
});
