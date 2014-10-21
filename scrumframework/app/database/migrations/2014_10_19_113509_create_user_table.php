<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($collection)
		{
			$collection->increments('id');
			$collection->string('email', 320)->unique();
			$collection->string('password', 60);
			//$collection->string('boardname',array('productbacklog' => description,));
			$collection->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
