<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function showHome()
	{
		$uri = Request::path();
		return View::make('home', array('uri' => $uri));
	}
	public function showMean()
	{
		$uri = Request::path();
		return View::make('mean', array('uri' => $uri));
	}
		public function showAbout()
	{
		$uri = Request::path();
		return View::make('about', array('uri' => $uri));
	}			
}
