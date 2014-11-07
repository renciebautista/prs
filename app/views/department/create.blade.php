@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-4">
	{{ Form::open(array('route' => 'department.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('department_desc', 'Department', array('class' => 'control-label')) }}
			{{ Form::text('department_desc','',array('class' => 'form-control', 'placeholder' => 'Department')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('department.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop