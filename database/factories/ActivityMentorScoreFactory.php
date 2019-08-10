<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ActivityMentorScore;
use Faker\Generator as Faker;

$factory->define(ActivityMentorScore::class, function (Faker $faker) {
  try{
    return [
        'mentor_id' => $faker->unique()->numberBetween(1,5),
        'score' => $faker->numberBetween(0,100),
    ];
  }catch(OverflowException $e){
    return [
      'mentor_id' => $faker->unique($reset = true)->numberBetween(1,5),
      'score' => $faker->numberBetween(0,100),
    ];
  }

});
