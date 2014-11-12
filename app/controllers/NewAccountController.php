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
		$newaccounts = NewAccount::get_for_approval_by_user_id(Auth::id());
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
		$cities = City::get_all();
		return View::make('newaccount.create',compact('pagetitle','account_types','cities'));
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
			$newaccount = new NewAccount;
			$newaccount->created_by = Auth::id();
			$newaccount->account_type_id = Input::get('account_type_id');
			$newaccount->account_name =  strtoupper(Input::get('account_name'));
			$newaccount->lot = Input::get('lot');
			$newaccount->street = Input::get('street');
			$newaccount->brgy = Input::get('brgy');
			$newaccount->city_id = Input::get('city_id');
			$newaccount->save();

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