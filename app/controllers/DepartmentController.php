<?php

class DepartmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /department
	 *
	 * @return Response
	 */
	public function index()
	{
		$departments = Department::all();
		$pagetitle = 'User Departments';
		return View::make('department.index',compact('departments', 'pagetitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /department/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New User Department';
		return View::make('department.create',compact('pagetitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /department
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Department::$rules);

		if($validation->passes())
		{
			$department = new Department();
			$department->department_desc = strtoupper(Input::get('department_desc'));
			$department->save();

			return Redirect::route('department.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly created.');
		}

		return Redirect::route('department.create')
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /department/{id}
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
	 * GET /department/{id}/edit
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
	 * PUT /department/{id}
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
	 * DELETE /department/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}