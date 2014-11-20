<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateProjectContactTableAddJoin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_contacts', function(Blueprint $table)
		{
			$table->boolean('joined')->default(false)->after('group_id');
			$table->boolean('status')->default(false)->after('joined');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('project_contacts', function(Blueprint $table)
		{
			$table->dropColumn(array('joined', 'status'));
		});
	}

}
