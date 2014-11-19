<?php

class AccountApprovalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accountapproval
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Accounts for Approval';
		$newaccounts = NewAccount::get_for_approval();
		return View::make('account-approval.index',compact('pagetitle', 'newaccounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /accountapproval/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /accountapproval
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /accountapproval/{id}
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
	 * GET /accountapproval/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pagetitle = 'New Account Approval';

		$newaccount = NewAccount::get_for_approval_by_id($id);

		if (is_null($newaccount))
		{
			return Redirect::route('account-approval.index')
				->with('class', 'alert-danger')
				->with('message', 'Project does not exist.');
		}

		$approved_accounts = NewAccount::get_approved($newaccount);
		return View::make('account-approval.edit',compact('pagetitle', 'newaccount', 'approved_accounts'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /accountapproval/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::transaction(function($id) use ($id)
		{
			$newaccount = NewAccount::where('approved',0)
				->where('id',$id)
				->first();
			
			if (is_null($newaccount))
			{
				return Redirect::route('account-approval.index')
					->with('class', 'alert-danger')
					->with('message', 'Record does not exist.');
			}

			if(Input::has('same')){
				$newaccount->same_as = Input::get('same_as');
				$account_id = $newaccount->same_as;

			}else{
				$account_id = $id;
			}

			$newaccount->approved = 1;
			$newaccount->approved_by = Auth::id();
			$newaccount->save();

			UserAccount::addAccount($newaccount->created_by,$account_id,$id);
		});

		return Redirect::route('account-approval.index')
			->with('class', 'alert-success')
			->with('message', 'Account successfuly added.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /accountapproval/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}