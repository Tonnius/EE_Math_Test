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

Route::get('login', array('before' => 'guest', function(){
	return View::make('login/login');
}));

Route::post('login', array('before' => 'guest|csrf', function(){
	$validator = Validator::make(
		Input::all(),
		array(
			'username' => 'required|min:3',
			'password' => 'required|min:3'
			),
		array(
			'username.required' => 'Palun sisesta kasutajanimi!',
			'password.required' => 'Palun sisesta parool!',
			'username.min' => 'Kasutajanimi peab olema vähemalt :min tähemärki pikk',
			'password.min' => 'Parool peab olema vähemalt :min tähemärki pikk'
		)
	);

	if ($validator->fails()) {
		return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
	} else {
		if(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
		{
			return Redirect::intended('/');
		} else {
			return Redirect::to('login')->withErrors(array('incorrect_credentials' => 'Vigane kasutajanimi/parool.'))->withInput(Input::except('password'));
		}
	}
}));

Route::get('logout', array('before' => 'auth|csrf', function(){
	Auth::logout();
	return Redirect::back();
}));

Route::get('signup', array('before' => 'guest',function(){
	return View::make('login/signup');
}));

Route::post('signup', array('before' => 'guest|csrf', function(){
	$validator = Validator::make(
		Input::all(),
		array(
			'username' => 'required|min:3',
			'password' => 'required|min:3|confirmed',
			'email' => 'required|email|confirmed',
			'agree' => 'required'
			),
		array(
			'username.required' => 'Palun sisesta kasutajanimi!',
			'password.required' => 'Palun sisesta parool!',
			'username.min' => 'Kasutajanimi peab olema vähemalt :min tähemärki pikk',
			'password.min' => 'Parool peab olema vähemalt :min tähemärki pikk'
		)
	);

	if ($validator->fails()) {
		return Redirect::to('signup')->withErrors($validator)->withInput(Input::except(array('password', 'password_confirm')));
	} else {
		User::create();
		return Redirect::to('login')->with(array('signup_success', 'Registreerumine õnnestus. Võid nüüd sisse logida.'));
	}
}));