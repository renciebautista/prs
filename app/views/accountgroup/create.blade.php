@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-6">
	{{ Form::open(array('route' => 'account-group.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('account_group', 'Account Group', array('class' => 'control-label')) }}
			{{ Form::text('account_group','',array('class' => 'form-control', 'placeholder' => 'Account Group')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('account-group.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop