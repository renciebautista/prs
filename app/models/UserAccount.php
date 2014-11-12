<?php

class UserAccount extends \Eloquent {
	protected $fillable = [];

	public static function myAccounts($id){
		return DB::table('user_accounts')
			->select('new_accounts.*','cities.city','provinces.province')
			->join('new_accounts', 'new_accounts.id', '=', 'user_accounts.account_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('user_id', $id)
			->get();
	}

	public static function addAccount($created_by,$account_id,$ref_id){
		if(is_null(self::accountExist($created_by,$account_id))){
			$user_account = new self();
			$user_account->user_id = $created_by;
			$user_account->account_id = $account_id;
			$user_account->account_ref = $ref_id;
			$user_account->save();
		}
	}

	private static function accountExist($created_by,$account_id){
		return self::where('user_id',$created_by)
			->where('account_id',$account_id)
			->first();
	}
}