@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		{{ Form::open(array('method' => 'get','class' => 'form-inline')) }}
		  	<div class="filter">
		  		<label class="radio-inline">
			  		<input type="radio" name="status" value="1" {{ Helper::oldRadio('status', '1', true) }}> Drafted
				</label>
	  	  		<label class="radio-inline">
			  		<input type="radio" name="status" value="2" {{ Helper::oldRadio('status', '2') }}> For Approval
				</label>
				<label class="radio-inline">
			  		<input type="radio" name="status" value="3" {{ Helper::oldRadio('status', '3') }} > Approved
				</label>
				<label class="radio-inline">
			  		<input type="radio" name="status" value="4" {{ Helper::oldRadio('status', '4') }} > Denied
				</label>
			</div>
		 	<div class="form-group">
		 		<label class="sr-only" for="s">Search</label>
		 		{{ Form::text('s',Input::old('s'),array('class' => 'form-control', 'placeholder' => 'Search')) }}
		  	</div>
		  	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
		  	<a href="{{ URL::action('DraftedProjectController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Project</a>
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
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($projects) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($projects as $project)
					<tr>
						<td>{{ $project->project_name }}</td>
						<td>{{ AccountHelper::address($project) }}</td>
						@if($project->state_id < 3)
						<td class="action">
							{{ HTML::linkAction('DraftedProjectController@edit','Edit', $project->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'action' => array('DraftedProjectController@destroy', $project->id))) }}                       
							{{ Form::submit('Delete', array('class'=> 'btn btn-danger btn-xs','onclick' => "if(!confirm('Are you sure to delete this record?')){return false;};")) }}
							{{ Form::close() }}
						</td>
						@else
						<td class="action">
							{{ HTML::linkAction('DraftedProjectController@show','View', $project->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						@endif
					</tr>
					@endforeach
					@endif
				</tbody>
			</table> 
		</div>
	</div>
</div>

@stop