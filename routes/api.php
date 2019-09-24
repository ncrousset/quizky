<?php

Route::post('register', 'Auth\RegisterController@register')->name('auth.register');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');

Route::middleware('auth:api')->group(function() {
    Route::namespace('Api')->group(function() {
        Route::get('answers/{question}/list', 'AnswersController@index')->name('answer.index');
        Route::resource('quizzes', 'QuizzesController')->only(['index', 'show', 'store', 'update']);
        Route::resource('questions', 'QuestionsController')->only(['index', 'show', 'store', 'update']);
        Route::resource('answers', 'AnswersController')->only(['show', 'store', 'update']);
    });
});
