<?php

class SprintnameController extends BaseController {

	public function index(){
		$sprintname = Input::get('sprintname');
		return 'Sprint-name = '.$sprintname;
	}

}