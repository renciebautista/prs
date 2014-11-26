<?php

class ApproveContactController extends \BaseController {

	private function allowApprove($id){
		return ProjectContact::where('id',$id)
			->where('status',1)
			->first();
	}

	/**
	 * Display a listing of the resource.
	 * GET /approvecontact
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Project Contacts for Approval';
		$projectcontacts = ProjectContact::forApproval(Input::get('s'));
		return View::make('approveaccount.index',compact('pagetitle', 'projectcontacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /approvecontact/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /approvecontact
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /approvecontact/{id}
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
	 * GET /approvecontact/{id}/edit
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
	 * PUT /approvecontact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = $this->allowApprove($id);
		
		if (is_null($contact))
		{
			return Redirect::action('ApproveContactController@index')
				->with('class', 'alert-danger')
				->with('message', 'Contact does not exist.');
		}

		if(Request::ajax()){
		
		}	

		if(Input::has('approve')){
			$contact->status = 2;
			$status = 'approved';
		}else{
			$contact->status = 3;
			$status = 'denied';
		}
		$contact->approved_by = Auth::id();
		$contact->save();

		return Redirect::action('ApproveContactController@index')
			->with('class', 'alert-success')
			->with('message', 'Contact successfuly '.$status.'.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /approvecontact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}