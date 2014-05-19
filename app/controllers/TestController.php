<?php

class TestController extends BaseController {

	
	public function GetTest(Topic $teema)
	{
		$tasks = $teema->tasks()->take(2)->orderBy('id', 'rand()')->get();
							
		return View::make('ylesanded', array('tasks' => $tasks, 'teema' => $teema, 'result'=> ''));
	}

	public function CheckTest(Topic $teema)
	{
		$answers = Input::get('answers');
		$TaskIds = Input::get('taskIds');
		$tasks = array();
		$correctAnswers = array();
		Eloquent::unguard();
		$var = Test::create(array(
			'user_id' => DB::table('users')->select('id')
            ->where('username', Auth::user()->username)
            ->first()
            ->id
		));
		
		for ($i = 0; $i < count($TaskIds); $i++)  {
			$task = DB::table('tasks')->where('id', $TaskIds[$i])->first();
			array_push($tasks, $task);
			
			TestHasTasks::create(array(
				'test_id' => $var->id,
				'task_id' => $TaskIds[$i],
				'pakutud_vastus' => $answers[$i]
			));
			if ($task->korrektne_vastus != $answers[$i]) {
				array_push($correctAnswers, $i+1);
			}
		}

		if (empty($correctAnswers)) 
			return View::make('ylesanded', array('tasks' => $tasks, 'teema' => $teema, 'result'=> 'korras'));
		else
			return View::make('ylesanded', array('tasks' => $tasks, 'teema' => $teema, 'result'=> $correctAnswers));

	}

}