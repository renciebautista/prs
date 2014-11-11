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
		$newaccounts = NewAccount::all();
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
		$newaccount = NewAccount::get_by_id($id);
		$approved_accounts = array();
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
		//
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