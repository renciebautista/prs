@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-6">
	{{ Form::open(array('route' => array('account-type.update', $accounttype->id), 'method' => 'PUT', 'class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('account_type', 'Account Type') }}
			{{ Form::text('account_type',$accounttype->account_type,array('class' => 'form-control', 'placeholder' => 'Account Type')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('account-type.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop