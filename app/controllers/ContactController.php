<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contact
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagetitle = 'Contact Lists';
		$contacts = Contact::myContacts(Auth::id(),Input::get('s'));
		return View::make('contact.index',compact('pagetitle', 'contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contact/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pagetitle = 'New Contact';
		$accounts = Account::myAccountList(Auth::id());
		return View::make('contact.create',compact('pagetitle', 'accounts'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contact
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$validation = Validator::make($input, Contact::$rules);

		if($validation->passes())
		{
			$contact = new Contact();
			$contact->created_by = Auth::id();
			$contact->first_name = strtoupper(Input::get('first_name'));
			$contact->middle_name = strtoupper(Input::get('middle_name'));
			$contact->last_name = strtoupper(Input::get('last_name'));
			if(Input::get('account_id') != 'default'){
				$contact->account_id = Input::get('account_id');
			}
			

			if(Contact::contactExist($contact)){
				return Redirect::route('contact.create')
					->withInput()
					->withErrors($validation)
					->with('class', 'alert-warning')
					->with('message', 'Contact information already exist.');
			}
			$contact->save();
			return Redirect::route('contact.index')
				->with('class', 'alert-success')
				->with('message', 'Contact successfuly created.');
		}

		return Redirect::route('contact.create')
			->withInput()
			->withErrors($validation)
			->with('class', 'alert-danger')
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /contact/{id}
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
	 * GET /contact/{id}/edit
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
	 * PUT /contact/{id}
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
	 * DELETE /contact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function lists($project_id = null, $group_id = null){
		$account = AccountGroup::find($group_id);
		if ((is_null($account)) ||(is_null($project_id)))
		{
			return Redirect::route('project.index')
				->with('class', 'alert-danger')
				->with('message', 'Project does not exist.');
		}
		$pagetitle = "Add contact in '" . ucwords(strtolower($account->account_group))."' group";
		$project_id = $project_id;
		$group_id = $group_id;
		$contacts = Contact::myContacts(Auth::id(),Input::get('s'));
		return View::make('contact.lists',compact('pagetitle', 'contacts', 'project_id', 'group_id'));
	}


}