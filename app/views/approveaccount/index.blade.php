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
						<th>Account Group</th>
						<th>Contact Name</th>
						<th>BDO</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($projectcontacts) == 0)
					<tr>
						<td colspan="5">No record found!</td>
					</tr>
					@else
					@foreach($projectcontacts as $contact)
					<tr>
						<td>
							{{ $contact->project_name}} <br>
							<em>{{ AccountHelper::address($contact) }}</em>
						</td>
						<td>{{ $contact->account_group }}</td>
						<td>
							{{ UserHelper::fullname($contact) }}<br>
							<em>{{ $contact->account_name }}</em>
						</td>
						<td>{{ ucwords(strtolower($contact->user_first_name .' '.$contact->user_middle_name .' '. $contact->user_last_name)) }}</td>
						<td class="action-submit">
							{{ Form::open(array('action' => array('ApproveContactController@update', $contact->project_contacts_id), 'method' => 'PUT', 'class' => 'form-inline')) }}        
							<input class="btn btn-primary btn-xs" type="submit" name="approve" id="approve" value="Approve">
							<input class="btn btn-danger btn-xs" type="submit" name="deny" id="deny" value="Deny">
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