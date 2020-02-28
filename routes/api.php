<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// account
Route::middleware('auth')->name('api.')->group(function(){
    Route::post('account/edit', 'AccountsController@api_edit')->name('account.edit');
});

// step
Route::middleware('auth')->name('api.')->group(function(){
    Route::get('home', 'StepsController@api_index')->name('step.index');
    Route::get('step/mypage_register', 'StepsController@api_mypage_register')->name('step.mypage_register');

});