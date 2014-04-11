<?php

class TaskTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tasks')->delete();

		
		Task::create(array('kirjeldus' => 'Sisesta number 1', 'korrektne_vastus' => 1, 'teemad' => 'Avaldised'));
	}
}