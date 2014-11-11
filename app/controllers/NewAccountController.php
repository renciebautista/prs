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
		$newaccounts = array();
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
		return View::make('newaccount.create',compact('pagetitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /newaccount
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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