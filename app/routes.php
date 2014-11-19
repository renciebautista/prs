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
	return View::make('hello');
});


Route::group(array('before' => 'auth'), function()
{
	Route::resource('dashboard', 'DashboardController');

	Route::resource('account-type', 'AccountTypeController');//

	Route::resource('user', 'UsersController');

	Route::resource('department', 'DepartmentController');

	Route::resource('role', 'RoleController');
	Route::get('role/{id}/manageprivilleges', array('as' => 'role.manageprivilleges', 'uses' => 'RoleController@manageprivilleges'));

	Route::get('contact/lists/', 'ContactController@lists');
	Route::get('contact/lists/{project_id}/{group_id}', 'ContactController@lists');

	Route::resource('contact', 'ContactController');

	Route::resource('projectapproval', 'ProjectApprovalController');
	
	Route::resource('project', 'DraftedProjectController');

	Route::resource('account', 'AccountController');

	Route::resource('account-group', 'AccountGroupController');

	Route::get('api/contact/search', 'api\ContactController@index');
	Route::post('api/project/addcontact', 'api\ProjectController@create');
	Route::get('api/project/contacts/{id}', 'api\ProjectContactController@show');
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
