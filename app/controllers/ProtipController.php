<?php

class ProtipController extends BaseController {


	public function protip()
	{
		$lause = '';
		switch(rand() % 3)
		{
			case 0:
				$lause = 'Alusta õppimist enne eksamieelset ööd!';
				break;
			case 1:
				$lause = 'Ära mängi arvutimänge!';
				break;
			case 2:
				$lause = 'Söö tükike šokolaadi!';
				break;
		}
		$data = array(
			'html' => '<h1>'.$lause.'</h1>'
		);
		return Response::json($data);
	}
}
