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

//Blade::setContentTags('<%', '%>');				// for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data

Route::post('/taskboard', array(
	'before' => 'auth',
	function()
	{
		$boardname = Input::get('boardname');
        $taskboardController = new TaskboardController;
		//show email @ navbar 
		// $email = Auth::user()->email; 
		// Session::flash('email',$email);
		// Session::flash('boardname',$boardname);
		// return View::make('login')->withInput(Input::except('password'));
        return $taskboardController->index();
	}
));

Route::get('/gettesttaskboard', 'TaskboardController@getTaskboard');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showHome'));

Route::get('taskboard', array('uses' => 'HomeController@showTaskboard'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('/inside', function()
{
	return "Hello inside";
});
Route::get('/404', function()
{
	return App::abort(404);
});
