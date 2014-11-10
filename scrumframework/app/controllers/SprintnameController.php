<?php

class SprintnameController extends BaseController {

	public function index(){
		$sprintname = Input::get('sprintname');
		return 'Sprint-name = '.$sprintname;
	}

	public function show($tid, $bid, $sprint)
	{
		URL::route('getboard',array('best', 'ever'));
		return $tid." + ".$bid." + ".$sprint;
	}

	public function getjson()
	{
		$sprintname = Input::get('best');
		return $sprintname;
	}

	public function store()
	{
		$data = Input::all();
		$myfile = fopen("/home/dscanon/newfile.txt", "w") or die("Unable to open file!");
		$team = Team::find($data['team']);
		$board = $team->taskboards::find('$id');
		//$team[$data['list']] = $data['pbacklog'];
	//	$team->save();
		fwrite($myfile, $team['name']);
		// $txt = "Jane Doe\n";
		fwrite($myfile, "Board = ");
	//	fwrite($myfile, $board['name']);
		fwrite($myfile, "List ");
		fclose($myfile);




	}

}