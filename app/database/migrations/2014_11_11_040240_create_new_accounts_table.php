<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_accounts', function($table){
			$table->increments('id');
			$table->integer('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('users');
			$table->integer('account_type_id')->unsigned();
			$table->foreign('account_type_id')->references('id')->on('account_types');
			$table->string('account_name');
			$table->string('lot');
			$table->string('street');
			$table->string('brgy');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('new_accounts', function (Blueprint $table) {
			$table->dropForeign('new_accounts_created_by_foreign');
			$table->dropForeign('new_accounts_account_type_id_foreign');
		});
		Schema::drop('new_accounts');
	}

}
