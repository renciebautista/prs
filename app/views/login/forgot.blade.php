@extends('layouts.public')

@section('content')
<!-- Forms
================================================== -->
<div class="bs-docs-section">

	<div class="row">
		<div class="col-lg-8">
		</div>
		<div class="col-lg-4">
			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-12">
						<h1>Forgot Password</h1>
					</div>
				</div>
			</div>

			@if($errors->has())
			   @foreach ($errors->all() as $error)
			      <div>{{ $error }}</div>
			  @endforeach
			@endif

		{{ Form::open(array('action' => 'UsersController@doLogin','class' => 'bs-component')) }}

			<div class="form-group">
				{{ Form::label('email', 'Username or Email', array('class' => 'control-label')) }}
				{{ Form::text('email','',array('class' => 'form-control', 'placeholder' => 'Username or Email')) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Reset Password', array('class' => 'btn btn-primary')) }}
			</div>
			
		{{ Form::close() }}

		</div>
	</div>
</div>
@stop