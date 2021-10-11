<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->unique()->word, 
         'ruc'=>$faker->sentence($nbWords=11, $variableNbWords=true),
         'dni'=>$faker->sentence($nbWords=8, $variableNbWords=true),
         'address'=>$faker->unique()->address,
         'phone'=>$faker->sentence($nbWords=9, $variableNbWords=true),
         'email'=>$faker->unique()->email,



    ];
});
