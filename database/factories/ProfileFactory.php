<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $total=User::count();
    return
    [
      'user_id'=>$faker->unique()->numberBetween(1, $total),
      'bio'=>$faker->text($maxNbChars=20),
      'company'=>$faker->text($maxNbChars=7),
      'technologies'=>$faker->text($maxNbChars=10)
    ];
});
