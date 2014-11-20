<?php

class ProjectApprovalController extends \BaseController {

	private function allowEdit($id){
		return Project::where('id',$id)
			->where('state_id', 2)
			->first();
	}

	/**
	 * Display a listing of the resource.
	 * GET /projectapproval
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Projects for Approval';
		Input::flash();
		$projects = Project::forApproval(Input::get('s'));
		return View::make('projectapproval.index',compact('pagetitle', 'projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projectapproval/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projectapproval
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /projectapproval/{id}
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
	 * GET /projectapproval/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prj = $this->allowEdit($id);
		
		if (is_null($prj))
		{
			return Redirect::action('ProjectApprovalController@index')
				->with('class', 'alert-danger')
				->with('message', 'Project does not exist.');
		}
		$pagetitle = 'Approve Project';
		$project = Project::details($id);
		$contacts = ProjectContact::contacts($id);
		$approved_projects = Project::approved($project);
		$users = User::getUsers();
		return View::make('projectapproval.edit', compact('pagetitle', 'project', 'contacts', 'approved_projects', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projectapproval/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$prj = $this->allowEdit($id);
		
		if (is_null($prj))
		{
			return Redirect::action('ProjectApprovalController@index')
				->with('class', 'alert-danger')
				->with('message', 'Project does not exist.');
		}

		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$rules = array(
			'remarks' => 'required'
		);

		$validation = Validator::make($input,$rules);
		if($validation->passes())
		{
			$project = Project::find($id);
			$project->assigned_by = Auth::id();
			$project->remarks = Input::get('remarks');
			if(Input::has('assign')){
				$project->state_id = 3;
				$project->assigned_to = Input::get('assign_to');
				$project->save();
			}
			elseif (Input::has('deny')) {
				$project->state_id = 4;
				$project->save();
			}else{
				return Redirect::action('ProjectApprovalController@edit', $id)
					->withInput()
					->withErrors($validation)
					->with('class', 'alert-danger')
					->with('message', 'There were validation errors.');
			}
			
			return Redirect::action('ProjectApprovalController@index')
				->with('class', 'alert-success')
				->with('message', 'Project successfuly updated.');
		}

		return Redirect::route('projectapproval.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projectapproval/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}