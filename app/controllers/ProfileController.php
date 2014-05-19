<?php

class ProfileController extends BaseController {

	public function GetProfileInfo()
	{
		$results = DB::select('select * from testhastasks
								inner join tests
								on testhastasks.test_id=tests.id
								where tests.user_id
								= ?
								', array(Auth::user()->id));
		$count = DB::select('select users.username, count(tests.id) AS NumberOfTestsDone
								from tests
								inner join users
								on tests.user_id = users.id
								where users.id
								= ?
								group by username
								', array(Auth::user()->id));
		/*$tasks = DB::select('select * from testhastasks
								inner join tasks
								on testhastasks.task_id=tasks.id
								where tests.user_id
								= ?
								', array(Auth::user()->id));*/

		return View::make('profiil', array('results' => $results, 'count' => $count));
	}

}