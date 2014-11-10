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
		$board = $team->taskboards();
		$currentboard = $board->find($data['board']);
		// if($data['list']=='list0'){
		// 	$currentboard->list0 = $data['pbacklog'];
		// }
		// elseif($data['list']=='list1'){
		// 	$currentboard->list1 = $data['pbacklog'];
		// }
		// elseif($data['list']=='list2'){
		// 	$currentboard->list2 = $data['pbacklog'];
		// }
		// elseif($data['list']=='list3'){
		// 	$currentboard->list3 = $data['pbacklog'];
		// }
		$currentboard->list0 = $data['list0'];
		$currentboard->list1 = $data['list1'];
		$currentboard->list2 = $data['list2'];
		$currentboard->list3 = $data['list1'];
		$currentboard->save();
		$board->save($currentboard);
		fwrite($myfile, $team['name']);
		fwrite($myfile, "Board = ");
	//	fwrite($myfile, json_encode($currentboard->list1));
		fwrite($myfile, "List ");
		fclose($myfile);
	}

}