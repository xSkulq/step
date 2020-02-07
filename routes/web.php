<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// lp
Route::get('/lp', function(){
    return view('lp');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// accounts
Route::get('/account/new', 'AccountsController@new')->name('account.new');
Route::get('/account/edit', 'AccountsController@edit')->name('account.edit');

// step
Route::get('/step', 'StepsController@index')->name('step.index');
Route::get('/step/mypage/register', 'StepsController@mypage_register')->name('step.mypage_register');
Route::get('/step/mypage/challenge', 'StepsController@mypage_challenge')->name('step.mypage_challenge');
Route::get('/step/new', 'StepsController@new')->name('step.new');
Route::get('/step/edit', 'StepsController@edit')->name('step.edit');
Route::get('/step/ditail/1', 'StepsController@show')->name('step.show');

// step_child
Route::get('/step/new/1', 'StepsController@child_new')->name('step.child_new');
Route::get('/step/edit/1/1', 'StepsController@child_edit')->name('step.child_edit');


