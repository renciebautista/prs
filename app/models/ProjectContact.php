<?php

class ProjectContact extends \Eloquent {
	protected $fillable = [];

	public static function contacts($id){
		return DB::table('project_contacts')
			->select('contacts.*', 'accounts.account_name', 'account_groups.account_group')
			->join('contacts', 'contacts.id', '=', 'project_contacts.contact_id')
			->join('account_groups', 'account_groups.id', '=', 'project_contacts.group_id')
			->leftJoin('accounts', 'accounts.id', '=', 'contacts.account_id')
			->where('project_id', $id)
			->orderBy('account_groups.account_group')
			->get();
	}
}