<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountGroupTableSeeder extends Seeder {

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('account_groups')->truncate();

		DB::statement("INSERT INTO account_groups (id, account_group) VALUES
			(1, 'PROJECT OWNER'),
			(2, 'DEVELOPER'),
			(3, 'GENERAL CONTRACTOR'),
			(4, 'PROJECT MANAGER / DESIGNER'),
			(5, 'ARCHITECT'),
			(6, 'APPLICATOR'),
			(7, 'DEALER / SUPPLIER');");
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}