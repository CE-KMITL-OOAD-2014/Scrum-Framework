<?php

class EmailmemberController extends BaseController {

	public function index($id=null){
		$emailmember = Input::get('emailmember');
		return 'Email-member = '.$emailmember.' id ='.$id;
	}

}