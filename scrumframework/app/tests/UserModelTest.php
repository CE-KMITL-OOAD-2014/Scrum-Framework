<?php

class UserModelTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

		public function testUsernameIsRequired()
	{
		$author = new User;
		$author->email = 'jo@example.com';
		$password = 'abcde';
		$author->save();

		$author = new User;
		$author->email = 'jo@example.com';
		$password = 'abcde';
		$this->assertFalse($author->validate(), 'Expected validation to fail.');
	}

}
