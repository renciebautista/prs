<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateProjectContactsAddApprovedBy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_contacts', function(Blueprint $table)
		{
			$table->integer('approved_by')->unsigned()->nullable()->after('status');
			$table->foreign('approved_by')->references('id')->on('users');
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
			$table->dropForeign('project_contacts_approved_by_foreign');
			$table->dropColumn('approved_by');
		});
	}

}
