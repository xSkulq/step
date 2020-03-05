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

Route::get('/', 'RootController@root')->name('root');

// lp
Route::get('/lp', function(){
    return view('lp');
});

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

// accounts
Route::get('/account/edit', 'AccountsController@edit')->name('account.edit');
Route::post('/account/edit', 'AccountsController@store')->name('account.store');
Route::post('/account/edit/destory', 'AccountsController@destory')->name('account.destory');

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
Route::post('/step/challenge/{id}', 'StepsController@challenge')->name('step.challenge');
Route::post('/step/challenge_stop/{id}', 'StepsController@challenge_stop')->name('step.challenge_stop');

// step_child
Route::get('/step/child/new/{id}', 'StepChildrenController@new')->name('step.child_new');
Route::get('/step/child/edit/{id}', 'StepChildrenController@edit')->name('step.child_edit');
Route::post('/step/child/new/{id}', 'StepChildrenController@store')->name('step.child_store');
Route::get('/step/child/ditail/{id}', 'StepChildrenController@show')->name('step.child_show');
Route::post('/step/child/{id}', 'StepChildrenController@update')->name('step.child_update');
Route::post('/step/child/destory/{id}', 'StepChildrenController@destory')->name('step.child_destory');
Route::post('/step/child/clear/{id}', 'StepChildrenController@clear')->name('step.child_clear');


