<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->word,
       
        'email'=>$faker->unique()->email,
         'ruc_number'=>$faker->sentence($nbWords=11, $variableNbWords=true),
         'phone'=>$faker->sentence($nbWords=9, $variableNbWords=true),

       

        // 'address'=>$faker->unique()->address,

    ];
});
