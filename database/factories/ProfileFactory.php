<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'birth_date' =>$faker->date(),
        'phone_number'=>$faker->phoneNumber,
    ];
});
