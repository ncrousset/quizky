<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'user_id' => 1, // this is user session
        'title' => $faker->unique()->text,
        'public' => rand(0,1)
    ];
});
