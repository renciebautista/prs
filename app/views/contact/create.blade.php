@extends('layouts.master')

@section('content')



<div class="row">

	<div class="col-lg-12">
	{{ Form::open(array('route' => 'contact.store','class' => 'bs-component')) }}

		<div class="form-group">
			<div class="row">
				<div class="col-lg-4">
					{{ Form::label('first_name', 'First Name', array('class' => 'control-label')) }}
					{{ Form::text('first_name','',array('class' => 'form-control', 'placeholder' => 'First Name')) }}
				</div>
				<div class="col-lg-4">
					{{ Form::label('middle_name', 'Middle Initial', array('class' => 'control-label')) }}
					{{ Form::text('middle_name','',array('class' => 'form-control', 'placeholder' => 'Middle Initial')) }}
				</div>
				<div class="col-lg-4">
					{{ Form::label('last_name', 'Last Name', array('class' => 'control-label')) }}
					{{ Form::text('last_name','',array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
				</div>
			</div>	
		</div>

				<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					{{ Form::label('account_id', 'Account Name', array('class' => 'control-label')) }}
					{{ Form::select('account_id',array('default' => 'SELECT ACCOUNT NAME') + $accounts, null, array('class' => 'form-control')) }}
				</div>
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('contact.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>

		
	{{ Form::close() }}
	</div>
</div>


@stop