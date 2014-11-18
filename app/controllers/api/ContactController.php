<?php
namespace Api;

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/contactsearch
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){
			$contacts = \Contact::myContacts(\Auth::id(),\Input::get('search'));
			$project = \Input::get('project');
			$group = \Input::get('group');
			return \View::make('api.contactlist', compact('contacts', 'project', 'group'));
			// return \Response::json(array(
			// 	'error' => false,
			// 	'contacts' => $contacts),
			// 	200
			// );
		}			
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/contactsearch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/contactsearch
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/contactsearch/{id}
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
	 * GET /api/contactsearch/{id}/edit
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
	 * PUT /api/contactsearch/{id}
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
	 * DELETE /api/contactsearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}