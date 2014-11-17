<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountGroupTableSeeder extends Seeder {

	public function run()
	{
		DB::table('account_groups')->truncate();

		DB::statement("INSERT INTO account_groups (id, account_group) VALUES
			(1, 'PROJECT OWNER'),
			(2, 'GENERAL CONTRACTOR'),
			(3, 'APPLICATOR'),
			(4, 'ARCHITECT'),
			(5, 'DEVELOPER'),
			(6, 'PROJECT DESIGNER'),
			(7, 'PROJECT MANAGER'),
			(8, 'DEALER / SUPPLIER');");
	}

}