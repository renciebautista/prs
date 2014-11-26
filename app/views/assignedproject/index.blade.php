@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		{{ Form::open(array('method' => 'get','class' => 'form-inline')) }}
		 	<div class="form-group">
		 		<label class="sr-only" for="s">Search</label>
		 		{{ Form::text('s',Input::old('s'),array('class' => 'form-control', 'placeholder' => 'Search')) }}
		  	</div>
		  	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
		{{ Form::close() }}
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Project Name</th>
						<th>Address</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($projects) == 0)
					<tr>
						<td colspan="3">No record found!</td>
					</tr>
					@else
					@foreach($projects as $project)
					<tr>
						<td>
							{{ $project->project_name }}
						</td>
						<td>{{ AccountHelper::address($project) }}</td>
						<td class="action">
							{{ HTML::linkAction('AssignedProjectController@show','View', $project->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table> 
		</div>
	</div>
</div>

@stop