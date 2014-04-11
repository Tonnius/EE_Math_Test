<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestHasTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testHasTasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_id')->unsigned();
			$table->integer('task_id')->unsigned();
			$table->string('pakutud_vastus');
			$table->timestamps();
		});
		Schema::table('testHasTasks', function($table)
    	{
       		$table->foreign('test_id')->references('id')->on('tests');
       		$table->foreign('task_id')->references('id')->on('tasks');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('testHasTasks');
	}

}
