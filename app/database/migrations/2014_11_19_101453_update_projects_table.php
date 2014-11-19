<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			$table->integer('assigned_by')->unsigned()->nullable()->after('state_id');
			$table->foreign('assigned_by')->references('id')->on('users');
			$table->integer('assigned_to')->unsigned()->nullable()->after('assigned_by');
			$table->foreign('assigned_to')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			$table->dropForeign('projects_assigned_by_foreign');
			$table->dropForeign('projects_assigned_to_foreign');
			$table->dropColumn(array('assigned_to', 'assigned_by'));
		});
	}

}
