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

Route::get('/', 'WelcomeController@index');

Route::get('/setlocale/{locale}', 'LocaleController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{module}', 'ModulesController@index');

Route::get('/{module}/{part}', 'ModulesController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'add'], function () {
  Route::post('{table}', 'AddController@index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'fetch'], function () {
  Route::post('{table}', 'FetchController@index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'edit'], function () {
  Route::post('{table}', 'EditController@index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'delete'], function () {
  Route::post('{table}', 'DeleteController@index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'sys'], function () {
  Route::post('lang', 'LocaleJSController@index');
});