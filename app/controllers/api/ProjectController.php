<?php
namespace Api;

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/project
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/project/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$projectcontact = new \ProjectContact;
		$projectcontact->project_id = \Input::get('project_id');
		$projectcontact->contact_id = \Input::get('contact_id');
		$projectcontact->group_id = \Input::get('group_id');
		$projectcontact->save();

		return \Response::json(array('error' => false),200);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/project
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /api/project/{id}/edit
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
	 * PUT /api/project/{id}
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
	 * DELETE /api/project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}