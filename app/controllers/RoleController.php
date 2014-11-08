<?php

class RoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /role
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::orderBy('name')->get();
		$pagetitle = 'User Roles';
		return View::make('role.index', compact('roles', 'pagetitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /role/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New User Role';
		return View::make('role.create',compact('pagetitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /role
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Role::$rules);

		if($validation->passes())
		{
			$role = new Role();
			$role->name = strtoupper(Input::get('name'));
			$role->save();

			return Redirect::route('role.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly created.');
		}

		return Redirect::route('role.create')
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Redirect::route('role.edit',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /role/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);
		if (is_null($role))
		{
			return Redirect::route('role.index')
				->with('class', 'alert-danger')
				->with('message', 'Record does not exist.');
		}
		$pagetitle = 'Edit User Role';
		return View::make('role.edit', compact('role','pagetitle'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Role::$rules);
		if ($validation->passes())
		{
			$role = Role::find($id);
			if (is_null($role))
			{
				return Redirect::route('role.index')
					->with('class', 'alert-danger')
					->with('message', 'Record does not exist.');
			}
			$role->name = strtoupper(Input::get('name'));
			$role->save();
			return Redirect::route('role.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly updated.');
		}

		return Redirect::route('role.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::find($id)->delete();
		if (is_null($role))
		{
			$class = 'alert-danger';
			$message = 'Record does not exist.';
		}else{
			$class = 'alert-success';
			$message = 'Record successfully deleted.';
		}
		return Redirect::route('role.index')
				->with('class', $class )
				->with('message', $message);
	}


	public function manageprivilleges($id){
		
	}
}