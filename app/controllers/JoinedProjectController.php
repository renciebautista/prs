<?php

class JoinedProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /joinedproject
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Joined Projects';
		Input::flash();
		$projects = Project::joined(Auth::id(),Input::get('s'));
		return View::make('joinedproject.index',compact('pagetitle', 'projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /joinedproject/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /joinedproject
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /joinedproject/{id}
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
	 * GET /joinedproject/{id}/edit
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
	 * PUT /joinedproject/{id}
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
	 * DELETE /joinedproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}