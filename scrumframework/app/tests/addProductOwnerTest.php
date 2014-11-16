<?php

class addProductOwnerTest extends TestCase {

	public function testpo()
	{
		 $email = "example@email.com";
		 $team = new Team;

		 $testteam = $team->addpo($email);
		 $this->assertTrue($testteam);
	}

}
