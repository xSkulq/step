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

//Route::get('/home', 'HomeController@index')->name('home');

// accounts
Route::get('/account/edit', 'AccountsController@edit')->name('account.edit');
Route::post('/account/edit', 'AccountsController@store')->name('account.store');

// step
Route::get('/home', 'StepsController@index')->name('step.index');
Route::get('/step/mypage_register', 'StepsController@mypage_register')->name('step.mypage_register');
Route::get('/step/mypage_challenge', 'StepsController@mypage_challenge')->name('step.mypage_challenge');
Route::get('/step/new', 'StepsController@new')->name('step.new');
Route::post('/step/new', 'StepsController@store')->name('step.store');
Route::get('/step/edit/{id}', 'StepsController@edit')->name('step.edit');
Route::get('/step/ditail/{id}', 'StepsController@show')->name('step.show');
Route::post('/step/{id}', 'StepsController@update')->name('step.update');
Route::post('/step/destory/{id}', 'StepsController@destory')->name('step.destory');

// step_child
Route::get('/step/child/new/{id}', 'StepChildrenController@new')->name('step.child_new');
Route::get('/step/child/edit/{id}', 'StepChildrenController@edit')->name('step.child_edit');
Route::post('/step/child/new/{id}', 'StepChildrenController@store')->name('step.child_store');
Route::get('/step/child/ditail/{id}', 'StepChildrenController@show')->name('step.child_show');
Route::post('/step/child/{id}', 'StepChildrenController@update')->name('step.child_update');
Route::post('/step/child/destory/{id}', 'StepChildrenController@destory')->name('step.child_destory');


