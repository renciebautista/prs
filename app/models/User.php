<?php
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;
 
class User extends Eloquent implements ConfideUserInterface {
    use ConfideUser;
    use HasRole;


	public static $rules = array(
		'first_name' => 'required',
		'last_name' => 'required',
		'department_id' => 'required',
		'role_id' => 'required',
		'username' => 'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'same:password',
	);


	public function roles()
	{
		return $this->belongsToMany('Role','assigned_roles');
	}

	public function department()
	{
		return $this->belongsTo('Department');
	}

	public function getFullname()
	{
	    return $this->attributes['first_name'] .' '.$this->attributes['last_name'];
	}
}