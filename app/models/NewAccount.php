<?php

class NewAccount extends Eloquent {
	protected $fillable = [];

	public static $rules = array(
		'account_type_id' => 'required',
		'account_name' => 'required'
	);

	public static function get_by_id($id)
	{
		return DB::table('new_accounts')
			->select('new_accounts.*','account_types.account_type')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->where('new_accounts.id', $id)
			->first();
	}
}