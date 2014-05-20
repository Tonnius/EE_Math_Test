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

// AssetProcessori jaoks
Route::get('/assets/{type}/{name}', \Config::get('assetprocessor::controller.name') . '@' . \Config::get('assetprocessor::controller.method'));

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('eksamist', function()
{
	return View::make('eksamist');
});

Route::get('kysiAbi', array('before' => 'auth', function()
{
	return View::make('kysiAbi');
}));

Route::get('kuidasOppida', function(){
	return View::make('kuidasOppida');
});
Route::get('login', array('before' => 'guest', 'uses' => 'AuthController@loginPage'));
Route::post('login', array('before' => 'guest|csrf', 'uses' => 'AuthController@loginSubmit'));
Route::get('logout', array('before' => 'auth|csrf', 'uses' => 'AuthController@logout'));
Route::get('signup', array('before' => 'guest', 'uses' => 'AuthController@signupPage'));
Route::post('signup', array('before' => 'guest|csrf', 'uses' => 'AuthController@signupSubmit'));
Route::get('login/facebook', array('before' => 'guest', 'uses' => 'AuthController@loginFacebook'));
Route::get('login/facebook/callback', array('before' => 'guest', 'uses' => 'AuthController@loginFacebookCallback'));


Route::bind('teema', function($value, $route)
{
	$ret = Topic::where('name', $value)->first();
	if($ret)
		return $ret;
	throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
});

Route::get('teemad/{teema}', array('before' => 'auth', function(Topic $teema)
{
	return View::make('teemaTemplate', array('teema' => $teema));
}));

Route::get('teemad/{teema}/ylesanded', array('before' => 'auth','uses' => 'TestController@GetTest'));
Route::post('teemad/{teema}/ylesanded', array('before' => 'auth','uses' => 'TestController@CheckTest')); 

Route::get('lisaYl', array('before' => 'auth|admin','uses' => 'YlController@InsertTestFields'));
Route::post('lisaYl', array('before' => 'auth|admin','uses' => 'YlController@AddTest'));

Route::get('opil', array('before' => 'auth|admin', 'uses' => 'ProfileController@GetAllUsers'));
Route::model('user', 'User');
Route::get('opil/{user}', array('before' => 'auth|admin', 'uses' => 'ProfileController@GetProfileInfoForUser'));


Route::get('protip', array('uses' => 'ProtipController@Protip'));

Route::get('profiil', array('before' => 'auth','uses' => 'ProfileController@GetProfileInfo'));
