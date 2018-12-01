<?php

use Faker\Generator as Faker;
use App\EventStatus;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' 				=> $faker->sentence,
        'address' 		=> $faker->address,
        'description' => $faker->sentence,
        'value' 			=> $faker->unique()->numberBetween($min = 1, $max = 250),
        'status_id' 	=> EventStatus::all()->random()->id,
        'date'				=> $faker->dateTime
    ];
});
