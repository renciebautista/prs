<?php

class AccountGroup extends \Eloquent {
	protected $fillable = ['account_group'];
	public $timestamps = false;

	public static $rules = array(
		'account_group' => 'required|unique:account_groups'
	);
}