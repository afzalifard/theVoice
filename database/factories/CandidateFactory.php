<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
    ];
});
