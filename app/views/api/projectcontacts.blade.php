<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Account Group</th>
			<th>Contact Name</th>
			<th>Account Name</th>		
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
			<td>{{ $contact->account_group }}</td>
			<td>{{ ContactHelper::fullname($contact) }}</td>
			<td>{{ $contact->account_name }}</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table> 