<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array('username' => 'JimRaynor', 'password' => Hash::make('terran'), 'email' => 'jim@example.com', 'user_level' => 'administrator'));
		User::create(array('username' => 'Mirjam', 'password' => Hash::make('password'), 'email' => 'mir@jam.ee'));
	}
}
