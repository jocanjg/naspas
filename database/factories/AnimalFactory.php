<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Animal::class, function (Faker $faker) {

    return [
    'pname'=> $faker->sentence(1),
    'dname'=> $faker->sentence(1),
    'address'=> $faker->sentence(2),
    'location_id'=> $faker->randomDigit,
    'nacin_id'=>$faker->randomDigit,
    'reason_id'=>$faker->randomDigit,
    'chip'=>$faker->randomDigit,
    'age'=>$faker->randomDigit
    DATE



    ];
});
