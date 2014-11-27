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
	 * Display the specified resource.
	 * GET /joinedproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$pagetitle = 'Project Details';
		$project = Project::details($id);
		$contacts = ProjectContact::contacts($id);
		return View::make('joinedproject.show', compact('pagetitle', 'project', 'contacts'));
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