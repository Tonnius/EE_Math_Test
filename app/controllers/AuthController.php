<?php

class AuthController extends BaseController {

	public function loginPage()
	{
		return View::make('login/login');
	}

	public function loginSubmit()
	{
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
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::back();
	}

	public function signupPage()
	{
		return View::make('login/signup');
	}

	public function signupSubmit()
	{
		$validator = Validator::make(
			Input::all(),
			array(
				'username' => 'required|min:3|unique:users,username',
				'password' => 'required|min:3|confirmed',
				'email' => 'required|email|confirmed|unique:users,email',
				'agree' => 'required',
				'recaptcha_response_field' => 'required|recaptcha'
				),
			array(
				'username.required' => 'Palun sisesta kasutajanimi!',
				'password.required' => 'Palun sisesta parool!',
				'email.required' => 'Palun sisesta e-mail!',
				'recaptcha_response_field.required' => 'Palun sisesta kontrollkood!',
				'agree.required' => 'Palun nõustu tingimustega!',
				'username.min' => 'Kasutajanimi peab olema vähemalt :min tähemärki pikk',
				'password.min' => 'Parool peab olema vähemalt :min tähemärki pikk',
				'password.confirmed' => 'Paroolid peavad ühtima',
				'email.confirmed' => 'E-maili aadressid peavad ühtima',
				'email.email' => 'Vigane e-maili aadress',
				'recaptcha_response_field.recaptcha' => 'Vigane kontrollkood',
				'username.unique' => 'Sellise nimega kasutaja eksisteerib',
				'email.unique' => 'Sellise e-mailiga kasutaja eksisteerib'
			)
		);

		if ($validator->fails()) {
			return Redirect::to('signup')->withErrors($validator)->withInput(Input::except(array('password', 'password_confirm')));
		} else {
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password')),
				'email' => Input::get('email')
			));
			return Redirect::to('login')->with('signup_success', 'Registreerumine õnnestus. Võid nüüd sisse logida.');
		}
	}
}
