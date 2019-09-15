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


Route::namespace('Auth')->post('register', 'RegisterController@register')->name('auth.register');

Route::namespace('Api')->group(function() {
    Route::post('quizzes', 'QuizzesController@store')->name('quizzes.store');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
