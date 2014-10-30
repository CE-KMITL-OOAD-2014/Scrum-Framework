<?php

class BoardTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBoard()
	{
	//	$response = $this->call('GET', '/taskboard/{id}/{bid}');
		$taskboardController = new TaskboardController;
		$id = "544f7ec36b26f73c048b457d";
		$bid = "544fc1786b26f72b1b8b4571";
   		$taskboardController = $taskboardController->processGetTaskboard($id, $bid);
   		$this->assertEquals('Team06', $taskboardController);
	}

}
