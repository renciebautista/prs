@extends('layouts.master')

@section('content')
{{ Form::open(array('route' => array('account-approval.update', $newaccount->id), 'method' => 'PUT', 'class' => 'bs-component')) }}
<div class="row">
	<div class="col-lg-12">
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
						{{ Form::text('city_id', $newaccount->city.' - '.$newaccount->province, array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="approve" id="approve" value="Approve">
			<input class="btn btn-warning" type="submit" name="same" id="same" value="Same Account">
			{{ HTML::linkRoute('account-approval.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Account Name</th>
						<th>Account Type</th>
						<th>Address</th>
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
						<td>{{ Form::radio('same_as', $approved_account->id ) }}</td>
						<td>{{ $approved_account->account_name }}</td>
						<td>{{ $approved_account->account_type }}</td>
						<td>{{ $approved_account->lot .' '.$approved_account->street .' '. $approved_account->brgy.' '.$approved_account->city.' - '.$approved_account->province}}</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table> 
		</div>
	</div>
</div>
{{ Form::close() }}
@stop