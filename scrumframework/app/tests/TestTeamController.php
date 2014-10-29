<?php


class TestTeamController extends TestCase
{
	public $errors;

	public function validate()
	{
		$validated = Validator::make($this->attributes, static::$rules);
		if ($validated->passes()) return true;
		$this->errors = $validated->messages();
		return false;
	}

	public function testIsInvalidWithoutAName()
	{
		$user = new User;
		$this->assertFalse($user->validate());
	}
}
