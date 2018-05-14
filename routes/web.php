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

Route::get('/', 'GraphController@index')->name('home');
Route::get('/login', 'GraphController@login')->name('login');
Route::get('/redirect', 'GraphController@redirect');
Route::get('/callback', 'GraphController@callback');
Route::get('/test', 'GraphController@test');
Route::get('/instagram', 'GraphController@instagramInfo');