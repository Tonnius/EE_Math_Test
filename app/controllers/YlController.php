<?php

class YlController extends BaseController {


	public function InsertTestFields()
	{

		$type = DB::select( DB::raw("SHOW COLUMNS FROM tasks WHERE Field = 'teemad'") )[ 0 ]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
	  $teemad = array();
	  foreach( explode(',', $matches[1]) as $value )
	  {
		$v = trim( $value, "'" );
		$teemad = array_add($teemad, $v, $v);
	  }

		return View::make('lisaYl', array('teemad' => $teemad));
	}
	public function AddTest()
	{

		Eloquent::unguard();
		$uusTask = Task::create(array('kirjeldus' => Input::get('kirjeldus'),
							'korrektne_vastus' => Input::get('vastus'), 
							'teemad' => Input::get('teema')));

		if ($uusTask) {
			return Redirect::to('lisaYl')->with('result', 'Ülesanne lisatud!');
		} else {
			return Redirect::to('lisaYl')->with('result', 'Ülesannet ei suudetud lisada, proovi uuesti.');
		}

	}

}