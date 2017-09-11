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

Route::get('/', 'LeaderboardController@index');


Auth::routes();

Route::get('/home', 'LeaderboardController@index');

Route::get('/add-runner', 'RunnerController@create')->name('add-runner');
Route::post('/add-runner', 'RunnerController@store');

Route::get('/delete-runner/{id}', 'RunnerController@delete');

Route::get('/add-times', 'TimesController@create')->name('add-times');
Route::post('/add-times', 'TimesController@store');

Route::get('/delete-time/{id}', 'TimesController@delete');



