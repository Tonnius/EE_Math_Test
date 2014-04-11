<?php

class TestTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tests')->delete();

		$var = DB::table('users')->select('id')
                                        ->where('username', 'JimRaynor')
                                        ->first()
                                        ->id;
		Test::create(array('user_id' => $var));
	}
}