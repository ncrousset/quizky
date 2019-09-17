<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => 1, // this is user session
        'title' => $faker->unique()->title,
        'public' => rand(0,1)
    ];
});
