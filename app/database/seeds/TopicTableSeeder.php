<?php

class TopicTableSeeder extends Seeder {

	public function run()
	{
		DB::table('topics')->delete();

		Topic::create(array('name' => 'Arvuhulgad'));
		Topic::create(array('name' => 'Avaldised'));
		Topic::create(array('name' => 'Võrrandid ja võrratused'));
		Topic::create(array('name' => 'Trigonomeetria'));
		Topic::create(array('name' => 'Vektor tasandil'));
		Topic::create(array('name' => 'Joone võrrand'));
		Topic::create(array('name' => 'Tõenäosus ja statistika'));
		Topic::create(array('name' => 'Funktsioonid I'));
		Topic::create(array('name' => 'Funktsioonid II'));
		Topic::create(array('name' => 'Tasandilised kujundid'));
		Topic::create(array('name' => 'Integraal'));
		Topic::create(array('name' => 'Stereomeetria'));
	}
}