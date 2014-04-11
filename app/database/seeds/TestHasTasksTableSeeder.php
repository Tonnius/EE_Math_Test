<?php

class TestHasTasksTableSeeder extends Seeder {

	public function run()
	{
		DB::table('testHasTasks')->delete();

		$taskId = DB::table('tasks')->select('id')
                                        ->first()
                                        ->id;

		$testId = DB::table('tests')->select('id')
                                        ->first()
                                        ->id;
                                                                     
		TestHasTasks::create(array('task_id' => $taskId, 'test_id' => $testId, 'pakutud_vastus' => '1'));
	}
}