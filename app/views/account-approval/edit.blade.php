@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
	{{ Form::open(array('route' => 'new-account.store','class' => 'bs-component')) }}

		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					{{ Form::label('account_name', 'Account Name', array('class' => 'control-label')) }}
					{{ Form::text('account_name', $newaccount->account_name, array('class' => 'form-control', 'placeholder' => 'Account Name', 'disabled' => '')) }}
				</div>
				<div class="col-lg-6">
					{{ Form::label('account_name', 'Account Type', array('class' => 'control-label')) }}
					{{ Form::text('account_name', $newaccount->account_type, array('class' => 'form-control', 'placeholder' => 'Account Name', 'disabled' => '')) }}
				</div>
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('account_address', 'Account Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot', $newaccount->lot, array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street', $newaccount->street, array('class' => 'form-control', 'placeholder' => 'Street', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy', $newaccount->brgy, array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::text('city_id','',array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			{{ Form::submit('Approve', array('class' => 'btn btn-primary')) }}
			{{ Form::submit('Same Account', array('class' => 'btn btn-warning')) }}
			{{ HTML::linkRoute('account-approval.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>

		
	{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Account Name</th>
						<th>Account Type</th>
						<th>Address</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($approved_accounts) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($approved_accounts as $approved_account)
					<tr>
						<td>{{ $approved_account->name}}</td>
						<td>{{ HTML::linkRoute('approved_account.manageprivilleges', 'Manage Privilleges', $approved_account->id) }}</td>
						<td class="action">
							{{ HTML::linkRoute('approved_account.edit','Edit', $approved_account->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('approved_account.destroy', $approved_account->id))) }}                       
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