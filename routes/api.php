<?php

use Illuminate\Support\Facades\Route;

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

// step
Route::middleware('auth')->name('api.')->group(function(){
    Route::get('home', 'StepsController@api_index')->name('step.index');
    Route::get('step/mypage_register', 'StepsController@api_mypage_register')->name('step.mypage_register');
    Route::get('step/mypage_challenge', 'StepsController@api_mypage_challenge')->name('step.mypage_challenge');

});