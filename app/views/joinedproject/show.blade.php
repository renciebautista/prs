@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name', $project->project_name, array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot', ProjectHelper::ucwords($project->lot), array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street', ProjectHelper::ucwords($project->street), array('class' => 'form-control', 'placeholder' => 'Street', 'disabled' => '')) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy', ProjectHelper::ucwords($project->brgy), array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::text('city_id', CityHelper::cityProvince($project), array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('assigned_to', 'Assigned To', array('class' => 'control-label')) }}
					{{ Form::text('assigned_to', $project->project_name, array('class' => 'form-control', 'placeholder' => 'Assigned To', 'disabled' => '')) }}
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					<div id="map" style="height: 400px; width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
							<h3 class="panel-title">Contacts</h3>
					  	</div>
					  	<div class="panel-body">
							<div id="results" class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Contact / Account Name</th>	
											<th>Account Group</th>
										</tr>
									</thead>
									<tbody>
										@if(count($contacts) == 0)
										<tr>
											<td colspan="2">No record found!</td>
										</tr>
										@else
										@foreach($contacts as $contact)
										<tr>
											<td>
												{{ ContactHelper::fullname($contact) }}<br>
												<em>{{ $contact->account_name }}</em>
											</td>
											<td>{{ $contact->account_group }}</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table> 
							</div>
					  	</div>
					</div>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Contacts</h3>
		  	</div>
		  	<div class="panel-body">
				<div id="results" class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Contact / Account Name</th>	
								<th>Account Group</th>
							</tr>
						</thead>
						<tbody>
							@if(count($contacts) == 0)
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
							@else
							@foreach($contacts as $contact)
							<tr>
								<td>
									{{ ContactHelper::fullname($contact) }}<br>
									<em>{{ $contact->account_name }}</em>
								</td>
								<td>{{ $contact->account_group }}</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>
@stop

@section('page-script')
	$('#map').staticmap({
		lat: {{ $project->lat }},
		lng: {{ $project->lng }}
	});
@stop