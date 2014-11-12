<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApproveByInNewAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::table('new_accounts', function($table){
			$table->boolean('approved')->default(false)->after('city_id');
			$table->integer('approved_by')->unsigned()->after('approved')->nullable();
			$table->foreign('approved_by')->references('id')->on('users');
			$table->integer('same_as')->unsigned()->after('approved_by');
		});
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('new_accounts', function($table){
			$table->dropForeign('new_accounts_approved_by_foreign');
			$table->dropColumn(array('approved', 'approved_by','same_as'));
		});
	}

}
