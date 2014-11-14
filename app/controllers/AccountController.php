<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /account
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Account Lists';
		Input::flash();
		$accounts = Account::myAccounts(Auth::id(),Input::get('s'));
		return View::make('account.index',compact('pagetitle', 'accounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /account/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Account';
		$account_types = AccountType::orderBy('account_type')->lists('account_type', 'id');
		$cities = City::get_all();
		return View::make('account.create',compact('pagetitle','account_types','cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /account
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Account::$rules);

		if($validation->passes())
		{
			$account = new Account;
			$account->created_by = Auth::id();
			$account->account_type_id = Input::get('account_type_id');
			$account->account_name =  strtoupper(Input::get('account_name'));
			$account->lot = strtoupper(Input::get('lot'));
			$account->street = strtoupper(Input::get('street'));
			$account->brgy = strtoupper(Input::get('brgy'));
			$account->city_id = Input::get('city_id');

			if(count(Account::accountExist($account)) == 0){
				$account->save();
				return Redirect::route('account.index')
					->with('class', 'alert-success')
					->with('message', 'Account succesfully addded.');
			}else{
				return Redirect::route('account.create')
					->withInput()
					->with('class', 'alert-warning')
					->with('message', 'Account information already exist.');
			}
			
			
		}

		return Redirect::route('account.create')
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /account/{id}
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
	 * GET /account/{id}/edit
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
	 * PUT /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}