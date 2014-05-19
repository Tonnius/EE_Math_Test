<?php

class TaskTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tasks')->delete();

		
		Task::create(array('kirjeldus' => '1+1', 'korrektne_vastus' => 2, 'topic_id' => 2));
	}
}