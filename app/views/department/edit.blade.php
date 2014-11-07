@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-4">
	{{ Form::open(array('route' => array('department.update', $department->id), 'method' => 'PUT', 'class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('department_desc', 'Department') }}
			{{ Form::text('department_desc',$department->department_desc,array('class' => 'form-control', 'placeholder' => 'Department')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('department.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop