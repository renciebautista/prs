@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-6">
	{{ Form::open(array('route' => 'user.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name', array('class' => 'control-label')) }}
			{{ Form::text('first_name','',array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		</div>

		<div class="form-group">
			{{ Form::label('last_name', 'Last Name', array('class' => 'control-label')) }}
			{{ Form::text('last_name','',array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
		</div>

		<div class="form-group">
			{{ Form::label('emp_id', 'Employee Id', array('class' => 'control-label')) }}
			{{ Form::text('emp_id','',array('class' => 'form-control', 'placeholder' => 'Employee Id')) }}
		</div>

		<div class="form-group">
			{{ Form::label('department_id', 'Department', array('class' => 'control-label')) }}
			{{ Form::select('department_id', $departments, null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('role_id', 'Role', array('class' => 'control-label')) }}
			{{ Form::select('role_id', $roles, null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
			{{ Form::text('username','',array('class' => 'form-control', 'placeholder' => 'Username')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email Address', array('class' => 'control-label')) }}
			{{ Form::text('email','',array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
			{{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Password')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password_confirmation', 'Password Confirmation', array('class' => 'control-label')) }}
			{{ Form::password('password_confirmation',array('class' => 'form-control', 'placeholder' => 'Password Confirmation')) }}
		</div>


		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('user.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop