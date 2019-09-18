<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {

    $types = ['check', 'radio'];

    return [
        'description' => $faker->text.'?',
        'type' => $types[rand(0,1)]
    ];
});