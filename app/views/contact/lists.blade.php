@extends('layouts.noheader')

@section('content')
<div class="row">
	<div class="col-lg-12">
		{{ Form::open(array('route' => 'department.store','class' => 'bs-component')) }}
		<div class="form-group">
			{{ Form::text('search','',array('id' => 'search', 'class' => 'form-control', 'placeholder' => 'Search')) }}
		</div>
		{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id="results" class="table-responsive">
			
		</div>
	</div>
</div>

@stop

@section('page-script')
$('#search').ajaxsearch({
	url: '{{ URL::to('api/contact/search') }}',
	result: '#results'
});

@stop