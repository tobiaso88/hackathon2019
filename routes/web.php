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

Route::get('/', 'HomeController@index');
Route::get('top100', 'HomeController@top100');
Route::get('most-given-name', 'HomeController@mostGivenName');

Route::resource('name', 'NameController')->only(['index']);
Route::resource('state', 'StateController')->only('index', 'show');
