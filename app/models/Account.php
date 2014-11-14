<?php

class Account extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
		'account_type_id' => 'required',
		'account_name' => 'required',
		'city_id' => 'required'
	);

	public static function myAccounts($user_id,$filter){
		return DB::table('accounts')
			->select('accounts.*','cities.city','provinces.province')
			->join('cities', 'cities.id', '=', 'accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('created_by', $user_id)
			->where('accounts.account_name', 'LIKE' ,"%$filter%")
			->get();
	}

	public static function accountExist($account){
		return DB::table('accounts')
			->where('account_name', $account->account_name)
			// ->where('lot', $account->lot)
			// ->where('street', $account->street)
			// ->where('brgy', $account->brgy)
			// ->where('city_id', $account->city_id)
			// ->where('created_by', $account->created_by)
			->first();
	}

	public static function myAccountList($user_id){
		return DB::table('accounts')
			->where('created_by', $user_id)
			->lists('account_name', 'id');
	}
}