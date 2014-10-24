<?php

class EmailmemberController extends BaseController {

	public function index(){
		$emailmember = Input::get('emailmember');
		return 'Email-member = '.$emailmember;
	}

}