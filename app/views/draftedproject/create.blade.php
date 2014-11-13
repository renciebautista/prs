@extends('layouts.master')

@section('content')



<div class="row">

	<div class="col-lg-12">
	{{ Form::open(array('route' => 'project.store','class' => 'bs-component')) }}
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
				</div>
			</div>

			
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot','',array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street','',array('class' => 'form-control', 'placeholder' => 'Street')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy','',array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::select('city_id',$cities, null, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkRoute('account.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>

		
	{{ Form::close() }}
	</div>
</div>


@stop