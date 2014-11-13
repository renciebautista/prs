@extends('layouts.master')

@section('content')

<div class="row">

	<div class="col-lg-12">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name', $project->project_name, array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot', $project->lot, array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street', $project->street, array('class' => 'form-control', 'placeholder' => 'Street')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy', $project->brgy, array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::select('city_id',$cities, $project->city_id, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
	</div>
	<div class="col-lg-6">
	@foreach($accountgroups as $group)
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<h3 class="panel-title">{{ ucwords(strtolower($group->account_group)) }}</h3>
			  	</div>
			  	<div class="panel-body">
					<div class="table-responsive">
						<div class="pull-right">
							<a class="btn btn-success btn-xs" href="#"><i class="fa fa-plus"></i> Account</a>
						</div>
						
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Account Name</th>
									<th>Address</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="2">No record found!</td>
								</tr>
							</tbody>
						</table> 
					</div>
			  	</div>
			</div>
		</div>
	</div>
	@endforeach
	</div>
</div>
@stop