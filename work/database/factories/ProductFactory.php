<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->ean8,
        'name' => $faker->streetName,
        'slug' => $faker->unique()->slug,
        'stock' => $faker->buildingNumber,
        //'short_description'=>$faker->sentence($nbWords=6, $variableNbWords=true),
        'short_description' => $faker->realText($maxNbChars = 360, $indexSize = 2),
        'long_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'sell_price' => $faker->randomNumber(2),
        'status' => 'ACTIVE',
        'subcategory_id' => rand(1, 10),
        'provider_id' => rand(1, 10),
    ];
});
