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
						<h1>Log In</h1>
					</div>
				</div>
			</div>

			@if($errors->has())
			   @foreach ($errors->all() as $error)
			      <div>{{ $error }}</div>
			  @endforeach
			@endif

		{{ Form::open(array('action' => 'SessionController@doLogin','class' => 'bs-component')) }}

			<div class="form-group">
				{{ Form::label('email', 'Username or Email', array('class' => 'control-label')) }}
				{{ Form::text('email','',array('class' => 'form-control', 'placeholder' => 'Username or Email')) }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
				{{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Easy to remember, hard to guess')) }}
			</div>

			<div class="checkbox">
	            <label for="remember">
	                <input type="hidden" name="remember" value="0">
	                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> Remember me
	                
	            </label>
	            {{ HTML::link('/forgot_password', 'Forgot your password?', array('class' => 'pull-right'))}}
	        </div>


	       

			<div class="form-group">
				{{ Form::submit('Log In', array('class' => 'btn btn-primary')) }}
			</div>
			
		{{ Form::close() }}

		</div>
	</div>
</div>
@stop