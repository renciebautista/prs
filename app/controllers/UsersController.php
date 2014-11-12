<?php

/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

   /**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'User List';
		$users = User::all();
		return View::make('user.index', compact('users', 'pagetitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New User';
		$departments = Department::orderBy('department_desc')->lists('department_desc', 'id');
		$roles = Role::orderBy('name')->lists('name', 'id');
		return View::make('user.create',compact('pagetitle','departments', 'roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, User::$rules);

		if($validation->passes())
		{
			$user = new User;
			$user->first_name = strtoupper(Input::get('first_name'));
			$user->last_name = strtoupper(Input::get('last_name'));
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->confirmation_code = md5(uniqid(mt_rand(), true));
			$user->confirmed = 1;
			$user->active = 1;
			$user->department_id = Input::get('department_id');
			$user->save();

			$role = Role::find(Input::get('role_id'));

			$user->roles()->attach($role->id); // id only

			return Redirect::route('user.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly created.');
		}

		return Redirect::route('user.create')
			 ->withInput(Input::except(array('password','password_confirmation')))
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
