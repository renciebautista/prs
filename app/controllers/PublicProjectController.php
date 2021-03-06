<?php

class PublicProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /publicproject
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Public Projects';
		Input::flash();
		
		$projects = Project::publicProjects(Input::get('s'));
		$accountgroups = AccountGroup::all();
		return View::make('publicproject.index',compact('pagetitle', 'projects','accountgroups'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /publicproject/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /publicproject
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /publicproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pagetitle = 'Join Project';
		$project = Project::publicDetails($id);
		$accountgroups = AccountGroup::all();
		return View::make('publicproject.show', compact('pagetitle', 'project', 'accountgroups'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /publicproject/{id}/edit
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
	 * PUT /publicproject/{id}
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
	 * DELETE /publicproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}