@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Account Name</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($accounts) == 0)
					<tr>
						<td colspan="3">No record found!</td>
					</tr>
					@else
					@foreach($accounts as $account)
					<tr>
						<td>{{ $account->account_name }}</td>
						<td>{{ ucwords(strtolower($account->lot .' '.$account->street .' '. $account->brgy.' '.$account->city.' - '.$account->province)) }}</td>
						<td class="action">
							{{ HTML::linkRoute('account.edit','More', $account->id, array('class' => 'btn btn-info btn-xs')) }}
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