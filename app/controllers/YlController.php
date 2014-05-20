<?php

class YlController extends BaseController {


	public function InsertTestFields()
	{
		return View::make('lisaYl', array('teemad' => Topic::lists('name', 'id')));
	}

	public function AddTest()
	{
		Eloquent::unguard();
		if(Input::hasFile('pilt'))
		{
			$file = Input::file('pilt');
			$destinationPath = 'uploads/images';
			$ext = strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION));
			if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif')
			{
				$n = time();
				do
				{
					++$n;
					$filename = sha1($n).'.'.$ext;
				}
				while(file_exists($destinationPath.'/'.$filename));


					$uusTask = Task::create(array('kirjeldus' => Input::get('kirjeldus'),
									'korrektne_vastus' => Input::get('vastus'), 
									'topic_id' => Input::get('teema'),
									'pilt' => $filename));

					$file->move($destinationPath, $filename);
			}
			else
				return Redirect::to('lisaYl')->with('result', 'Ülesannet ei suudetud lisada, sest pilt on vales formaadis, proovi uuesti.');				

		} else {
			$uusTask = Task::create(array('kirjeldus' => Input::get('kirjeldus'),
							'korrektne_vastus' => Input::get('vastus'), 
							'topic_id' => Input::get('teema')));
		}

		if($uusTask)
			return Redirect::to('lisaYl')->with('result', 'Ülesanne lisatud!');
		else
			return Redirect::to('lisaYl')->with('result', 'Ülesannet ei suudetud lisada, proovi uuesti.');
	}
}
