<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		// TODO: Add more users
		User::create(array('username' => 'JimRaynor', 'password' => Hash::make('terran'), 'email' => 'jim@example.com'));
	}
}