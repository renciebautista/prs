<?php

class AccountGroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accountgroup
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Account Groups';
		$accountgroups = AccountGroup::orderby('account_group')->get();
		return View::make('accountgroup.index',compact('pagetitle', 'accountgroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /accountgroup/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Account Group';
		return View::make('accountgroup.create',compact('pagetitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /accountgroup
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, AccountGroup::$rules);

		if($validation->passes())
		{
			$accountgroup = new AccountGroup();
			$accountgroup->account_group = strtoupper(Input::get('account_group'));
			$accountgroup->save();

			return Redirect::route('account-group.index')
				->with('class', 'alert-success')
				->with('message', 'Account group successfuly created.');
		}

		return Redirect::route('account-group.create')
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /accountgroup/{id}
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
	 * GET /accountgroup/{id}/edit
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
	 * PUT /accountgroup/{id}
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
	 * DELETE /accountgroup/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}