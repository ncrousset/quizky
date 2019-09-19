<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id, // this is user session
        'title' => $faker->realText(50),
        'public' => rand(0,1)
    ];
});
