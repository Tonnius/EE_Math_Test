<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| API Keys
	|--------------------------------------------------------------------------
	|
	| Set the public and private API keys as provided by reCAPTCHA.
	|
	*/
	'public_key'	=> '6LeqHvASAAAAALAXpOwTYYftB75enTlfa2iobRln',
	'private_key'	=> isset($_SERVER['recaptcha_private_key'])?$_SERVER['recaptcha_private_key']:'',
	
	/*
	|--------------------------------------------------------------------------
	| Template
	|--------------------------------------------------------------------------
	|
	| Set a template to use if you don't want to use the standard one.
	|
	*/
	'template'		=> 'recaptcha',
	
);