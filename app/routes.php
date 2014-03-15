<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('eksamist', function()
{
	return View::make('eksamist');
});

Route::get('login', array('before' => 'guest', 'uses' => 'AuthController@loginPage'));
Route::post('login', array('before' => 'guest|csrf', 'uses' => 'AuthController@loginSubmit'));
Route::get('logout', array('before' => 'auth|csrf', 'uses' => 'AuthController@logout'));
Route::get('signup', array('before' => 'guest', 'uses' => 'AuthController@signupPage'));
Route::post('signup', array('before' => 'guest|csrf', 'uses' => 'AuthController@signupSubmit'));