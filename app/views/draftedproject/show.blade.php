@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		
		<div class="form-group">
			{{ Form::label('department_desc', 'Project Name', array('class' => 'control-label')) }}
			{{ Form::text('department_desc','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>
		<div class="form-group">
			{{ Form::label('department_desc', 'Project Address', array('class' => 'control-label')) }}
			{{ Form::text('department_desc','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>
		<div class="form-group">
			{{ Form::label('department_desc', 'Date Reported', array('class' => 'control-label')) }}
			{{ Form::text('department_desc','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>
	</div>

	<div class="col-lg-8">
		<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Project Owner</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Developer</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">General Contractor</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Project Manager/Designer</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Architect</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Applicator</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Delear/Supplier</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">No record found!</td>
							</tr>
						</tbody>
					</table> 
				</div>
		  	</div>
		</div>
	</div>
</div>
	</div>
</div>

@stop