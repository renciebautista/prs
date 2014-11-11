<?php

class NewAccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /newaccount
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'New Account Lists';
		$newaccounts = NewAccount::all();
		return View::make('newaccount.index',compact('pagetitle', 'newaccounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /newaccount/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Account';
		$account_types = AccountType::orderBy('account_type')->lists('account_type', 'id');
		return View::make('newaccount.create',compact('pagetitle','account_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /newaccount
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, NewAccount::$rules);

		if($validation->passes())
		{
			$user = new NewAccount;
			$user->created_by = Auth::id();
			$user->account_type_id = Input::get('account_type_id');
			$user->account_name =  strtoupper(Input::get('account_name'));
			$user->lot = Input::get('lot');
			$user->street = Input::get('street');
			$user->brgy = Input::get('brgy');
			$user->save();

			return Redirect::route('new-account.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly created.');
		}

		return Redirect::route('new-account.create')
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /newaccount/{id}
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
	 * GET /newaccount/{id}/edit
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
	 * PUT /newaccount/{id}
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
	 * DELETE /newaccount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}