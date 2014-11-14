<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccounTypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('account_types')->truncate();

		DB::statement("INSERT INTO account_types (id, account_type) VALUES
			(1, 'ORGANIZATION'),
			(2, 'COMPANY');");
	}

}