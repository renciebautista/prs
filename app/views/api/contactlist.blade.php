<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Contact Name</th>
			<th>Account Name</th>
			<th style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
		@if(count($contacts) == 0)
		<tr>
			<td colspan="3">No record found!</td>
		</tr>
		@else
		@foreach($contacts as $contact)
		<tr>
			<td>{{ ContactHelper::fullname($contact) }}</td>
			<td>{{ $contact->account_name }}</td>
			<td class="action">
				{{ Form::open(array('action' => 'api\ProjectController@create','class' => 'contact-info bs-component')) }}
				{{ Form::hidden('project_id', $project) }}           
				{{ Form::hidden('group_id', $group) }}  
				{{ Form::hidden('contact_id', $contact->id) }}                  
				{{ Form::submit('Use', array('class'=> 'btn btn-info btn-xs','onclick' => "if(!confirm('Are you sure to use this record?')){return false;};")) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table> 

@section('page-script')

@stop