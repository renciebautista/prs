@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('department.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Department</a>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="bs-component">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Department</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($departments) == 0)
					<tr>
						<td colspan="3">No record found!</td>
					</tr>
					@else
					@foreach($departments as $department)
					<tr>
						<td>{{ $department->department_desc }}</td>
						<td class="action">
							{{ HTML::linkRoute('department.edit','Edit', $department->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('department.destroy', $department->id))) }}                       
							{{ Form::submit('Delete', array('class'=> 'btn btn-danger btn-xs','onclick' => "if(!confirm('Are you sure to delete this record?')){return false;};")) }}
							{{ Form::close() }}
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