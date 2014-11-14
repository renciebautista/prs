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
		  	<a href="{{ URL::route('contact.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Contact</a>
		{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Contact Name</th>
						<th>Account Name</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($contacts) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($contacts as $contact)
					<tr>
						<td>{{ ContactHelper::fullname($contact) }}</td>
						<td>{{ $contact->account_name }}</td>
						<td class="action">
							{{ HTML::linkRoute('contact.edit','Edit', $contact->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('contact.destroy', $contact->id))) }}                       
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