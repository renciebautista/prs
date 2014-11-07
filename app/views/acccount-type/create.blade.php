@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-4">
	{{ Form::open(array('route' => 'account-type.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('account_type', 'Account Type', array('class' => 'control-label')) }}
			{{ Form::text('account_type','',array('class' => 'form-control', 'placeholder' => 'Account Type')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('account-type.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop