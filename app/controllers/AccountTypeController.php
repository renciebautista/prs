<?php

class AccountTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accounttype
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounttypes = AccountType::all();
		$pagetitle = 'Account Types';
		return View::make('acccount-type.index',compact('accounttypes', 'pagetitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /accounttype/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Account Type';
		return View::make('acccount-type.create',compact('pagetitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /accounttype
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, AccountType::$rules);

		if($validation->passes())
		{
			$accounttype = new AccountType();
			$accounttype->account_type = strtoupper(Input::get('account_type'));
			$accounttype->save();

			return Redirect::route('account-type.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly created.');
		}

		return Redirect::route('account-type.create')
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /accounttype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Redirect::route('account-type.edit',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /accounttype/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accounttype = AccountType::find($id);
		if (is_null($accounttype))
		{
			return Redirect::route('account-type.index')
				->with('class', 'alert-danger')
				->with('message', 'Record does not exist.');
		}
		$pagetitle = 'Edit Account Type';
		return View::make('acccount-type.edit', compact('accounttype','pagetitle'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /accounttype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, AccountType::$rules);
		if ($validation->passes())
		{
			$accounttype = AccountType::find($id);
			if (is_null($accounttype))
			{
				return Redirect::route('account-type.index')
					->with('class', 'alert-danger')
					->with('message', 'Record does not exist.');
			}
			$accounttype->account_type = strtoupper(Input::get('account_type'));
			$accounttype->save();
			return Redirect::route('account-type.index')
				->with('class', 'alert-success')
				->with('message', 'Record successfuly updated.');
		}

		return Redirect::route('account-type.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /accounttype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	

		$accounttype = AccountType::find($id)->delete();
		if (is_null($accounttype))
		{
			$class = 'alert-danger';
			$message = 'Record does not exist.';
		}else{
			$class = 'alert-success';
			$message = 'Record successfully deleted.';
		}
		return Redirect::route('account-type.index')
				->with('class', $class )
				->with('message', $message);
	}

}