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
		$pagetitle = 'Account Lists';
		Input::flash();
		if(Input::get('status',1) == 1){
			$accounts = UserAccount::myAccounts(Auth::id(),Input::get('s'));
		}else{
			$accounts = NewAccount::myAccountsForApproval(Auth::id(),Input::get('s'));
		}
		
		return View::make('newaccount.index',compact('pagetitle', 'accounts'));
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

		// $account = new NewAccount;
		// $account->account_name = Session::get('account_name');
		// $account->lot = Session::get('lot');
		// $account->street = Session::get('street');
		// $account->brgy = Session::get('brgy');
		// $account->city_id = Session::get('city_id');

		// $existing_accounts = NewAccount::accountExists($account);

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

			$existing_account = NewAccount::accountExist($newaccount);
			if(count($existing_account) == 0){
				$newaccount->save();
				return Redirect::to('account?status=0&s=')
					->with('class', 'alert-success')
					->with('message', 'Record successfuly created, please wait for the approval.');
			}else{
				UserAccount::addAccount(Auth::id(),$existing_account->id,$existing_account->id);
				return Redirect::route('account.index')
					->withInput()
					->with('class', 'alert-warning')
					->with('message', 'Account succesfully addeed and approved.');
				// return Redirect::route('account.create')
				// 	->withInput()
				// 	->with('class', 'alert-warning')
				// 	->with('message', 'Account information already approved.')
				// 	->with('account_name', $newaccount->account_name)
				// 	->with('lot', $newaccount->lot)
				// 	->with('street', $newaccount->street)
				// 	->with('brgy', $newaccount->brgy)
				// 	->with('city_id', $newaccount->city_id);
			}
			
			
		}

		return Redirect::route('account.create')
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