<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kirjeldus');
			$table->string('korrektne_vastus'); //should be string?
			$table->enum('teemad', array('Arvuhulgad', 'Avaldised', 'Võrrandid_ja_Võrratused',
										'Trigonomeetria', 'Vektor_tasandil', 'Joone_võrrand',
										'Tõenäosus_ja_statistika', 'Funktsioonid_I', 'Funktsioonid_II',
										"Tasandilised_kujundid", 'Integraalid', 'Stereomeetria'));
			//$table->string('formula'); 
			//$table->foreign('test_id')->references('id')->on('tests');
			
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
		Schema::drop('tasks');
	}

}
