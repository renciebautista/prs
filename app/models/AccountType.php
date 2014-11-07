<?php

class AccountType extends \Eloquent {
	protected $fillable = ['account_type'];
	public $timestamps = false;

	public static $rules = array(
		'account_type' => 'required|unique:account_types'
	);
}