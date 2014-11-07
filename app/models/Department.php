<?php

class Department extends \Eloquent {
	protected $fillable = ['department_desc'];
	public $timestamps = false;

	public static $rules = array(
		'department_desc' => 'required|unique:departments'
	);
}