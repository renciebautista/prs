@extends('layouts.noheader')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::text('search','',array('id' => 'search', 'class' => 'form-control', 'placeholder' => 'Search', 'autocomplete' => 'off')) }}
		</div>
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
		result: '#results',
		project: {{ $project_id }},
		group: {{ $group_id }},
		post_url: '{{ URL::to('api/project/addcontact') }}'
	});


@stop