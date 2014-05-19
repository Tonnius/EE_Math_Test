<?php

class YlController extends BaseController {


	public function InsertTestFields()
	{
		return View::make('lisaYl', array('teemad' => Topic::lists('name', 'id')));
	}

	public function AddTest()
	{
		Eloquent::unguard();
		$uusTask = Task::create(array('kirjeldus' => Input::get('kirjeldus'),
							'korrektne_vastus' => Input::get('vastus'), 
							'topic_id' => Input::get('teema')));

		if($uusTask)
			return Redirect::to('lisaYl')->with('result', 'Ülesanne lisatud!');
		else
			return Redirect::to('lisaYl')->with('result', 'Ülesannet ei suudetud lisada, proovi uuesti.');
	}
}
