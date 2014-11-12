<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityIdOnNewAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('new_accounts', function($table){
			$table->integer('city_id')->unsigned()->after('brgy');
			$table->foreign('city_id')->references('id')->on('cities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('new_accounts', function($table){
			$table->dropForeign('new_accounts_city_id_foreign');
			$table->dropColumn('city_id');
		});
	}

}
