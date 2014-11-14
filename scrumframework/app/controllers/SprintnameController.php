<?php

class SprintnameController extends BaseController {


	public function store()
	{
		$data = Input::all();
		$myfile = fopen("/home/dscanon/newfile.txt", "w") or die("Unable to open file!");
		$team = Team::find($data['team']);
		$board = $team->taskboards();
		$currentboard = $board->find($data['board']);

		$currentboard->delete('list0');
		$currentboard->unset('list0');
		
		$currentboard->delete('list1');
		$currentboard->unset('list1');

		$currentboard->delete('list2');
		$currentboard->unset('list2');

		$currentboard->delete('list3');
		$currentboard->unset('list3');

		$currentboard->list0 = array();
		$currentboard->list1 = array();
		$currentboard->list2 = array();
		$currentboard->list3 = array();

		$currentboard->list0 = $data['list0'];
		$currentboard->list1 = $data['list1'];
		$currentboard->list2 = $data['list2'];
		$currentboard->list3 = $data['list3'];
		$currentboard->save();
		$board = $board->save($currentboard);

		fwrite($myfile, $team['name']);
		fwrite($myfile, "Board = ");
		fwrite($myfile, json_encode($data['list1']));
		fwrite($myfile, "List ");
		fclose($myfile);
	}

}