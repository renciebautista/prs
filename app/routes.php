<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// return View::make('hello');
	return Redirect::action('DashboardController@index');
});


Route::group(array('before' => 'auth'), function()
{
	Route::resource('dashboard', 'DashboardController');

	Route::resource('account-type', 'AccountTypeController');//

	Route::resource('user', 'UsersController');

	Route::resource('department', 'DepartmentController');

	Route::resource('role', 'RoleController');
	Route::get('role/{id}/manageprivilleges', array('as' => 'role.manageprivilleges', 'uses' => 'RoleController@manageprivilleges'));


	Route::get('contact/joinedlists/{project_id}/{group_id}', 'ContactController@joinedlists');
	Route::get('contact/lists/{project_id}/{group_id}', 'ContactController@lists');
	Route::resource('contact', 'ContactController');


	Route::resource('account', 'AccountController');

	Route::resource('account-group', 'AccountGroupController');

	// drafted projects
	Route::group(array('prefix' => 'drafted'), function()
	{
		Route::get('project', 'DraftedProjectController@index');
		Route::get('project/create', 'DraftedProjectController@create');
		Route::post('project', 'DraftedProjectController@store');
		Route::get('project/{id}', 'DraftedProjectController@show');
		Route::get('project/{id}/edit', 'DraftedProjectController@edit');
		Route::put('project/{id}', 'DraftedProjectController@update');
		Route::delete('project/{id}', 'DraftedProjectController@destroy');
	});

	// approve projects
	Route::group(array('prefix' => 'approve'), function()
	{
		Route::get('project', 'ProjectApprovalController@index');
		Route::get('project/{id}/edit', 'ProjectApprovalController@edit');
		Route::put('project/{id}', 'ProjectApprovalController@update');

		Route::get('contact', 'ApproveContactController@index');
		Route::put('contact/{id}', 'ApproveContactController@update');
	});

	// public projects
	Route::group(array('prefix' => 'public'), function()
	{
		Route::get('project', 'PublicProjectController@index');
		Route::get('project/{id}', 'PublicProjectController@show');
	});

	// assigned projects
	Route::group(array('prefix' => 'assigned'), function()
	{
		Route::get('project', 'AssignedProjectController@index');
		Route::get('project/{id}', 'AssignedProjectController@show');
	});

	// joined projects
	Route::group(array('prefix' => 'joined'), function()
	{
		Route::get('project', 'JoinedProjectController@index');
		Route::get('project/{id}', 'JoinedProjectController@show');
	});


	// api
	Route::group(array('prefix' => 'api'), function()
	{
		Route::get('contact/search', 'api\ContactController@index');

		Route::get('project/contacts/{id}', 'api\ProjectContactController@show');
		Route::post('project/addcontact', 'api\ProjectController@store');
		
		Route::get('project/joinedcontact/{id}', 'api\ProjectContactController@joinedcontact');
		Route::post('project/joincontact', 'api\ProjectController@joincontact');
	});

	
});
// Confide routes
// Route::get('users', 'UsersController@index');
// Route::get('users/create', 'UsersController@create');
// Route::post('users', 'UsersController@store');

Route::get('login', 'SessionController@login');
Route::post('login', 'SessionController@doLogin');

Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('forgot_password', 'UsersController@forgotPassword');
Route::post('forgot_password', 'UsersController@doForgotPassword');

Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');

Route::get('logout', 'SessionController@logout');
