<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'song_name' => $faker->city,
        'date' => $faker->dateTimeThisMonth(),
    ];
});
