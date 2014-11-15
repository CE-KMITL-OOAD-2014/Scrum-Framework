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


//Blade::setContentTags('<%', '%>');			// for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data

//HOME PAGE.
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showhome'));

//MEANING PAGE.
Route::get('/meaning', array('as' => 'mean', 'uses' => 'HomeController@showMean'));

//ABOUT PAGE.
Route::get('/about', array('as' => 'about', 'uses' => 'HomeController@showAbout'));

//[POST]MAIN PAGE WHEN LOGEDIN.
Route::post('/main', function(){
	$login = new LoginController;
	return $login->index();
});

//[GET]MAIN PAGE WHEN LOGEDIN.
Route::get('/main', array('as' => 'main',
	'before' => 'auth',
	function()
	{
		$email = Auth::user()->email;
		Session::flash('email',$email);
		return View::make('main')->withInput(Input::except('password'));
	}
));

// SHOW ALL TASK BOARD IN JSON FORMAT.
Route::get('/gettaskboard', function(){
	$board = new TaskboardController;
	return $board->getTaskboard();
});

//CREATE BOARD.
Route::post('/taskboard', array(
	'before' => 'auth',function()
	{
		//$boardname = Input::get('boardname');
        $taskboardController = new TaskboardController();
		//show email @ navbar
		// $email = Auth::user()->email;
		// Session::flash('email',$email);
		// Session::flash('boardname',$boardname);
		// return View::make('login')->withInput(Input::except('password'));
        return $taskboardController->index();
	}
));

// ACCESS BOARD.
Route::get('taskboard/{id}/{bid}', array(
	'before' => 'auth', function($id, $bid)
{
	$taskboardController = new TaskboardController;
    return $taskboardController->getTaskboard($id, $bid);
}));


//Recieve Board
Route::post('/recievedboard', 'SprintnameController@store');



//DELETE BOARD.
Route::get('taskboard/{id}/{bid}/delete', array(
	'before' => 'auth', function($id, $bid)
{
	$taskboardController = new TaskboardController;
    return $taskboardController->deleteTaskboard($id, $bid);
}));

//DELETE PO.
Route::get('/deletetaskboard/po/{tid}/{poname}', array(
	'before' => 'auth', function($tid, $poname)
{
	$teamController = new TeamController;
    return $teamController->deletepo($tid, $poname);
}));

//DELETE TM.
Route::get('/deletetaskboard/tm/{tid}/{tmname}', array(
	'before' => 'auth', function($tid, $tmname)
{
	$teamController = new TeamController;
    return $teamController->deletetm($tid, $tmname);
}));

//ADD TEAM
Route::post('/addteam', array(
	'before' => 'auth',function()
	{
        $teamController = new TeamController();
        return $teamController->store();
	}
));

//ADD USER IN TEAM.
Route::post('/adduser', array(
	'before' => 'auth',function()
	{
         $teamController = new TeamController;
         return $teamController->adduser();
	}
));

//INPUT SPRINT NAME.
Route::post('/taskboard/{id}/inputsprintname', array(
	'before' => 'auth', function($id=null)
	{
		$sprintnameController = new SprintnameController;
		return $sprintnameController->index();
		//$sprintname = Input::get('sprintname');
		//return 'sprintname = '.$sprintname;
	}
));

// WHEN EDIT SPRINT NAME.
Route::post('taskboard/{id}/inputemail', array(
	'before' => 'auth', function($id=null)
	{
		$emailmember = new EmailmemberController;
		return $emailmember->index($id);
	}
));

//GET BOARD IN JSON FORMAT
Route::get('/gettesttaskboard', 'TaskboardController@getTaskboard');

//GET BOARD IN JSON FORMAT
Route::get('/gettestuser', 'LoginController@userToJSON');

//GET TEAM IN JSON FORMAT
Route::get('/gettestteam', 'TeamController@getTeam');


//GET TEAM IN JSON FORMAT
Route::get('/getboard/{v}/{k}',array('as' => 'getboard', function($v,$k)
{
	$sprintnameController = new SprintnameController;
	return $sprintnameController->getjson();
}));


Route::get('/testq', 'TaskboardController@getAuthorizedUser');

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
	//return Response::make('You are now logged out. :(');
});

Route::post('/signup', function(){
	$form = new FormController;
	return $form->index();
});

Route::get('/inside', function()
{
	return "Hello inside";
});
Route::get('/404', array('as' => '404', function()
{
	return App::abort(404);
}));


