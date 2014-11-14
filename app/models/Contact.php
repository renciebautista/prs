<?php

class Contact extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
		'first_name' => 'required',
		'last_name' => 'required'
	);

	public static function myContacts($user_id,$filter){
		return DB::table('contacts')
			->select('contacts.*', 'accounts.account_name')
			->leftJoin('accounts', 'accounts.id', '=', 'contacts.account_id')
			->where('contacts.created_by', $user_id)
			->where(function($query) use ($filter){
				$query->where('first_name', 'LIKE', "%$filter%")
					->orWhere('middle_name', 'LIKE', "%$filter%")
					->orWhere('last_name', 'LIKE', "%$filter%");
			})
			->get();
	}

	public static function contactExist($contact){
		return DB::table('contacts')
			->where('created_by', $contact->created_by)
			->where('middle_name', $contact->middle_name)
			->where('last_name', $contact->last_name)
			->where('account_id', $contact->account_id)			
			->first();
	}
}