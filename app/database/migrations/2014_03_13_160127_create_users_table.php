<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password')->nullable();
			$table->string('email')->unique();
			$table->string('facebookId')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->enum('user_level', array('regular_user', 'administrator'));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
