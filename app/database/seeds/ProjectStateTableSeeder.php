<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectStateTableSeeder extends Seeder {

	public function run()
	{
		DB::table('project_states')->truncate();

		DB::statement("INSERT INTO project_states (id, project_state) VALUES
			(1, 'DRAFTED'),
			(2, 'FOR APPROVAL'),
			(3, 'APPROVED'),
			(4, 'DENIED');");
	}

}