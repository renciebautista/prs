@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-6">
	{{ Form::open(array('route' => 'new-account.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('account_type_id', 'Account Type', array('class' => 'control-label')) }}
			{{ Form::select('account_type_id', $account_types, null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('account_name', 'Account Name', array('class' => 'control-label')) }}
			{{ Form::text('account_name','',array('class' => 'form-control', 'placeholder' => 'Account Name')) }}
		</div>

		

		<div class="form-group">
			{{ Form::label('account_address', 'Account Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot','',array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street','',array('class' => 'form-control', 'placeholder' => 'Street')) }}
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
			{{ Form::text('brgy','',array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
		</div>

		<div class="form-group">
			{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
			{{ Form::select('city_id',$cities, null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('new-account.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>

		
	{{ Form::close() }}
	</div>
</div>
@stop