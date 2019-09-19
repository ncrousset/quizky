<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {

    return [
        'question_id' => factory(\App\Models\Question::class)->create()->id,
        'description' => $faker->firstName,
        'is_valid' => false
    ];
});
