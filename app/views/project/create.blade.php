@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-6">
	{{ Form::open(array('route' => 'department.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
			{{ Form::text('project_name','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>

		<div class="form-group">
			{{ Form::label('project_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						<input id="lot" class="form-control" type="text" placeholder="Lot / Blk / House No. / Unit No." name="lot" value="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						<input id="street" class="form-control" type="text" placeholder="Street" name="street" value="">
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
			{{ Form::text('project_name','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>

		<div class="form-group">
			{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
			{{ Form::text('project_name','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('department.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop