<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Box;
use Faker\Generator as Faker;

$factory->define(Box::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'short_description' => $faker->text($maxNbChars = 100),
        'long_description' => $faker->text($maxNbChars = 1000),
        'address_line_1' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => $faker->country,
        'zip' => $faker->postcode,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->phoneNumber
    ];
});
