<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::middleware('auth:api')->group(function() {
    Route::get('quizzes', 'Api\QuizzesController@index')->name('quizzes.index');
    Route::get('quizzes/{quiz}', 'Api\QuizzesController@show')->name('quizzes.show');
    Route::post('quizzes', 'Api\QuizzesController@store')->name('quizzes.store');
    Route::put('quizzes/{quiz}', 'Api\QuizzesController@update')->name('quizzes.update');
//    Route::namespace('Api')->group(function() {
//
//    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
