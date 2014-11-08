<?php

class DraftedProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /draftedproject
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Drafted Projects';
		$projects = array();
		return View::make('draftedproject.index',compact('projects','pagetitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /draftedproject/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /draftedproject
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /draftedproject/{id}
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
	 * GET /draftedproject/{id}/edit
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
	 * PUT /draftedproject/{id}
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
	 * DELETE /draftedproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}