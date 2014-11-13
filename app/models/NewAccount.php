<?php

class NewAccount extends Eloquent {
	protected $fillable = [];

	public static $rules = array(
		'account_type_id' => 'required',
		'account_name' => 'required',
		'city_id' => 'required'
	);

	public static function accountExist($account){
		return DB::table('new_accounts')
			->select('new_accounts.*','cities.city','provinces.province','account_types.account_type')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('account_name', $account->account_name)
			->where('lot', $account->lot)
			->where('street', $account->street)
			->where('brgy', $account->brgy)
			->where('city_id', $account->city_id)
			->where('approved', 1)
			->first();
	}

	public static function myAccountsForApproval($user_id,$filter){
		return DB::table('new_accounts')
			->select('new_accounts.*','account_types.account_type','cities.city','provinces.province')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('approved', 0)
			->where('created_by', $user_id)
			->where('new_accounts.account_name', 'LIKE' ,"%$filter%")
			->get();
	}

	public static function get_for_approval()
	{
		return DB::table('new_accounts')
			->select('new_accounts.*','account_types.account_type','cities.city','provinces.province')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('approved', 0)
			->get();
	}

	public static function get_for_approval_by_id($id)
	{
		return DB::table('new_accounts')
			->select('new_accounts.*','account_types.account_type','cities.city','provinces.province')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('new_accounts.id', $id)
			->where('approved', 0)
			->first();
	}

	public static function get_approved($newaccount)
	{
		
		return DB::table('new_accounts')
			->select('new_accounts.*','account_types.account_type','cities.city','provinces.province')
			->join('account_types', 'account_types.id', '=', 'new_accounts.account_type_id')
			->join('cities', 'cities.id', '=', 'new_accounts.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('approved', 1)
			->where('same_as', 0)
			->where(function($query) use ($newaccount){
				$name_keys = explode(" ",$newaccount->account_name);
				$lot_keys = explode(" ",$newaccount->lot);
				$street_keys = explode(" ",$newaccount->street);
				$brgy_keys = explode(" ",$newaccount->brgy);

				$query->where(function($subquery) use ($name_keys){
					for( $i=0; $i<count($name_keys); $i++){
						if($name_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('account_name','LIKE', "%$name_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('account_name', 'LIKE', "%$name_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($lot_keys){
					for( $i=0; $i<count($lot_keys); $i++){
					   	if($lot_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('lot','LIKE', "%$lot_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('lot', 'LIKE', "%$lot_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($street_keys){
					for( $i=0; $i<count($street_keys); $i++){
					   	if($street_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('street','LIKE', "%$street_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('street', 'LIKE', "%$street_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($brgy_keys){
					for( $i=0; $i<count($brgy_keys); $i++){
					   	if($brgy_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('brgy','LIKE', "%$brgy_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('brgy', 'LIKE', "%$brgy_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere('city_id',$newaccount->city_id)
				->get();
			})
			->get();
	}

}