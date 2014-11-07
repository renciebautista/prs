@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-4">
	{{ Form::open(array('route' => 'account-type.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('full_name', 'Full Name', array('class' => 'control-label')) }}
			{{ Form::text('full_name','',array('class' => 'form-control', 'placeholder' => 'Full Name')) }}
		</div>

		<div class="form-group">
			{{ Form::label('emp_id', 'Employee Id', array('class' => 'control-label')) }}
			{{ Form::text('emp_id','',array('class' => 'form-control', 'placeholder' => 'Employee Id')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email Address', array('class' => 'control-label')) }}
			{{ Form::text('email','',array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
		</div>

		<div class="form-group">
			{{ Form::label('emp_id', 'Department', array('class' => 'control-label')) }}
			{{ Form::text('emp_id','',array('class' => 'form-control', 'placeholder' => 'Department')) }}
		</div>

		<div class="form-group">
			{{ Form::label('emp_id', 'Group', array('class' => 'control-label')) }}
			{{ Form::text('emp_id','',array('class' => 'form-control', 'placeholder' => 'Account Type')) }}
		</div>

		<div class="form-group">
			{{ Form::label('emp_id', 'Bank Account', array('class' => 'control-label')) }}
			{{ Form::text('emp_id','',array('class' => 'form-control', 'placeholder' => 'Account Type')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('user.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop