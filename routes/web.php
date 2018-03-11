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

Route::get('/help', function () {
    return view('help');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/stats', 'StatsController@stats');

Route::get('/stats/{username}/{platform}', 'StatsController@getStats');

Route::post('/stats/fresh', 'StatsController@freshStats');
