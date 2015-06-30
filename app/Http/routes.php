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

Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

Route::get('/admin', 'HomeController@index');

Route::controllers([
	'admin' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('prefix' => 'admin'), function() {

	Route::resource('lotteries/manage', 'LotteriesController');

});