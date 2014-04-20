<?php

class ProfileController extends BaseController {

	public function GetProfileInfo()
	{
		$results = DB::select('select * from testhastasks
								inner join tests
								on testhastasks.test_id=tests.id
								inner join tasks
								on testhastasks.task_id=tasks.id
								group by testhastasks.id
								');


		return View::make('salajane',array('results' => $results));
	}

}