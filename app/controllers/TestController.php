<?php

class TestController extends BaseController {

	
	public function GetTest()
	{

		$task = DB::table('tasks')->first();

		return View::make('avaldised', array('task' => $task));
	}
	public function CheckTest()
	{
		$task = DB::table('tasks')->first();
		$answer = Input::get('answer');

		Eloquent::unguard();
		$var = Test::create(array(
				'user_id' => DB::table('users')->select('id')
                                        ->where('username', Auth::user()->username)
                                        ->first()
                                        ->id
			));
		
		TestHasTasks::create(array(
			'test_id' => $var->id,
			'task_id' => $task->id,
			'pakutud_vastus' => $answer
		));
		if ($task->korrektne_vastus == $answer) {
			return Redirect::to('avaldised')->with('result', 'Õige vastus!');
		}
		else
			return Redirect::to('avaldised')->with('result', 'Kahjuks oli vastus vale, proovi uuesti!');
	}

}