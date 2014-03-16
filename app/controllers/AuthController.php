<?php

class AuthController extends BaseController {

	public function loginFacebook()
	{
		$facebook = new Facebook(Config::get('app.facebook'));
		$params = array(
			'redirect_uri' => url('/login/facebook/callback'),
			'scope' => 'email'
			);
		return Redirect::to($facebook->getLoginUrl($params));
	}

	public function loginFacebookCallback()
	{
		$code = Input::get('code');
		if(strlen($code) == 0)
			return Redirect::to('login')->withErrors(array('message' => 'Ühendumine Facebookiga ebaõnnestus'));

		$facebook = new Facebook(Config::get('app.facebook'));
		$uid = $facebook->getUser();

		if($uid == 0)
			return Redirect::to('login')->withErrors(array('message' => 'Viga Facebooki kasutaja pärimisel'));

		$me = $facebook->api('/me');

		$usr = User::where('facebookId', '=', $me['id'])->first();
		if(empty($usr))
		{
			if(isset($me['email']))
			{
				$usr = User::where('email', '=', $me['email'])->first();
				if(empty($usr))
				{
					$username = $me['username'];
					$usr = User::where('username', '=', $username)->first();
					while(!empty($usr))
					{
						$username = $me['username'].mt_rand(1,999);
						$usr = User::where('username', '=', $username)->first();
					}
					$usr = User::create(array(
						'username' => $username,
						'email' => $me['email'],
						'facebookId' => $me['id']));
				} else {
					$usr->facebookId = $me['id'];
					$usr->save();
				}
			} else {
				return Redirect::to('login')->withErrors(array('message' => 'Selle rakenduse kasutamiseks peab olema kehtiv e-maili aadress.'));
			}
		}
		if(!empty($usr))
		{
			Auth::login($usr);
			return Redirect::intended('/');
		}
		return Redirect::to('login')->withErrors(array('message' => 'Viga facebookiga sisselogimisel.'));
	}

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
		return Redirect::to('/')->with(array('logout_message' => 'Olete edukalt välja logitud.'));
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
