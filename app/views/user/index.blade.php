@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> User</a>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="bs-component">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Account Type</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($users) == 0)
					<tr>
						<td colspan="3">No record found!</td>
					</tr>
					@else
					@foreach($users as $user)
					<tr>
						<td>{{ $user->account_type }}</td>
						<td class="action">
							{{ HTML::linkRoute('account-type.edit','Edit', $user->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('account-type.destroy', $user->id))) }}                       
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