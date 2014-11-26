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

	public static function joinedContacts($user_id,$id){
		return DB::table('project_contacts')
			->select('contacts.*', 'accounts.account_name', 'account_groups.account_group','projectcontact_status.status')
			->join('contacts', 'contacts.id', '=', 'project_contacts.contact_id')
			->join('account_groups', 'account_groups.id', '=', 'project_contacts.group_id')
			->join('projectcontact_status', 'projectcontact_status.id', '=', 'project_contacts.status')
			->leftJoin('accounts', 'accounts.id', '=', 'contacts.account_id')
			->where('project_id', $id)
			->where('joined',1)
			->where('contacts.created_by',$user_id)
			->orderBy('account_groups.account_group')
			->get();
	}

	public static function forApproval($filter){
		return DB::table('project_contacts')
			->select('contacts.*', 'accounts.account_name', 'account_groups.account_group',
				'projectcontact_status.status', 'projects.*','cities.city','provinces.province',
				'users.first_name as user_first_name','users.middle_name as user_middle_name',
				'users.last_name as user_last_name', 'project_contacts.id as project_contacts_id')
			->join('contacts', 'contacts.id', '=', 'project_contacts.contact_id')
			->join('account_groups', 'account_groups.id', '=', 'project_contacts.group_id')
			->join('projectcontact_status', 'projectcontact_status.id', '=', 'project_contacts.status')
			->leftJoin('accounts', 'accounts.id', '=', 'contacts.account_id')
			->join('projects', 'projects.id', '=', 'project_contacts.project_id')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->join('users', 'users.id', '=', 'contacts.created_by')
			->where('project_contacts.status', 1)
			->where('project_contacts.joined',1)
			->get();
	}

	
}