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

/*
Route::get('/', function()
{
	return View::make('home');
});
 */

//Blade::setContentTags('<%', '%>');			// for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showhome'));

//Route::get('/taskboard', array('as' => 'logedin', 'uses' => 'HomeController@showLogin'));

Route::get('/taskboard', array(
	'before' => 'auth',
	function()
	{
	return View::make('login');
	}
));

Route::post('/taskboard', function(){
	$credentials = Input::only('email', 'password');
	$remember = Input::has('remember');
	if (Auth::attempt($credentials)) {
	return Redirect::intended('taskboard');
	}
	return Redirect::to('/');
});

Route::get('/logout', function()
{
Auth::logout();
return Response::make('You are now logged out. :(');
});
/*
Route::post('/login', function()
{
	$data = Input::all();
	$rules = array(
		'email' => 'required|email|min:5|max:32', //don't forget to add unique:users rule
		'password' => 'required|min:6',
		'password_confirmation' => 'required|same:password' 
	);
	$validator = Validator::make($data, $rules);

	if ($validator->fails()) {

		// get the error messages from the validator
		$messages = $validator->messages();

		// redirect our user back to the form with the errors from the validator
		return Redirect::to('/')->withErrors($validator);
	} else {
		// validation successful ---------------------------


		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		// save
		$user->save();

		// redirect ----------------------------------------
		// redirect our user back to the form so they can do it all over again
		//return Redirect::to('/');
		return 'Data was saved';		
	}
});
*/


Route::post('/signup', function(){
	$form = new FormController;
	return $form->index();
});

//Route::post('login', array('uses' => 'HomeController@showLogin'));
//Route::post('login', array('uses' => 'HomeController@doLogin'));
//Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('/inside', function()
{
	return "Hello inside";
});
Route::get('/404', function()
{
	return App::abort(404);
});
