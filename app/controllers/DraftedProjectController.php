<?php

class DraftedProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /newproject
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Drafted Projects';
		Input::flash();
		
		$projects = Project::myDraftedProject(Auth::id(),Input::get('status', 1), Input::get('s'));
		return View::make('draftedproject.index',compact('pagetitle', 'projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /newproject/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Project';
		$cities = City::get_all();
		return View::make('draftedproject.create',compact('pagetitle', 'cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /newproject
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Project::$rules);

		if($validation->passes())
		{
			$project = new Project;
			$project->created_by = Auth::id();
			$project->project_name =  strtoupper(Input::get('project_name'));
			$project->lot = strtoupper(Input::get('lot'));
			$project->street = strtoupper(Input::get('street'));
			$project->brgy = strtoupper(Input::get('brgy'));
			$project->city_id = Input::get('city_id');
			$project->state_id = 1;
			$project->save();
			return Redirect::route('project.edit',$project->id)
				->with('class', 'alert-success')
				->with('message', 'Project successfuly created.');
			
		}

		return Redirect::route('project.create')
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /newproject/{id}
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
	 * GET /newproject/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pagetitle = 'Update Project';
		$project = Project::details($id);
		if (is_null($project))
		{
			return Redirect::route('project.index')
				->with('class', 'alert-danger')
				->with('message', 'Record does not exist.');
		}
		$cities = City::get_all();

		$accountgroups = AccountGroup::all();

		return View::make('draftedproject.edit', compact('pagetitle', 'project', 'cities', 'accountgroups'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /newproject/{id}
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
	 * DELETE /newproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}