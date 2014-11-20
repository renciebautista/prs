<?php
namespace Api;

class ProjectContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/projectcontact
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/projectcontact/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/projectcontact
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/projectcontact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contacts = \ProjectContact::contacts($id);
		return \View::make('api.projectcontacts', compact('contacts'));
	}

	/**
	 * Display the specified resource.
	 * GET /api/projectcontact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function joinedcontact($id)
	{
		$contacts = \ProjectContact::joinedContacts(\Auth::id(),$id);
		return \View::make('api.joinedcontacts', compact('contacts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /api/projectcontact/{id}/edit
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
	 * PUT /api/projectcontact/{id}
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
	 * DELETE /api/projectcontact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}