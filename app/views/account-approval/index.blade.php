@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Account Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($newaccounts) == 0)
					<tr>
						<td colspan="2">No record found!</td>
					</tr>
					@else
					@foreach($newaccounts as $newaccount)
					<tr>
						<td>{{ $newaccount->account_name }}</td>
						<td class="action">
							{{ HTML::linkRoute('account-approval.edit','Edit', $newaccount->id, array('class' => 'btn btn-info btn-xs')) }}
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