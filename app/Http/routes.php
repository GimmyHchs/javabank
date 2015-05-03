<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//Route::get('account','AccountController@index');
Route::post('/bank/{bank}','BankController@openaccount');
$router->resource('bank','BankController');
$router->resource('account','AccountController');

Route::controllers([

	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);

