@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-4">
	{{ Form::open(array('route' => 'role.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('name', 'Role', array('class' => 'control-label')) }}
			{{ Form::text('name','',array('class' => 'form-control', 'placeholder' => 'Role')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('role.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop