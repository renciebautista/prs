@extends('layouts.master')

@section('content')

<div class="row">
	{{ Form::open(array('route' => array('project.update', $project->id), 'method' => 'PUT', 'class' => 'bs-component')) }}
	<div class="col-lg-12">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name', $project->project_name, array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot', $project->lot, array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street', $project->street, array('class' => 'form-control', 'placeholder' => 'Street')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy', $project->brgy, array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::select('city_id',$cities, $project->city_id, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="update" id="update" value="Update">
			<input class="btn btn-warning" type="submit" name="post" id="post" value="Post">
			{{ HTML::linkRoute('project.index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	</div>
	{{ Form::close() }}
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
				<h3 class="panel-title">Contacts</h3>
		  	</div>
		  	<div class="panel-body">
		  		<div>
					<div class="btn-group dropup">
						<a class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
							<i class="fa fa-plus"></i> Contact</a>
						</a>
						<ul class="dropdown-menu">
							@foreach($accountgroups as $accountgroup)
							<li>
								<a class="account_group iframe" target="_blank" id="{{ $accountgroup->id }}"  href="#">{{ $accountgroup->account_group }}</a>
							</li>
							@endforeach
						</ul>
					</div>
					
				</div>
				<div id="results" class="table-responsive">
					
				</div>
		  	</div>
		</div>
	</div>
</div>


@stop

@section('page-script')
	$(".iframe").colorbox({
		iframe:true, 
		width:"80%", 
		height:"90%",
		overlayClose:false,
		onClosed:function(){ update_contact(); }
	});

	$('.account_group').click(function(){
		var url = "{{ URL::to('contact/lists',array('project_id' => $project->id)) }}/"+$(this).attr('id');
		$('.account_group').attr("href", url);
	});

	function update_contact(){
		$.get("{{ URL::to('api/project/contacts',$project->id) }}", function(response){
			$('#results').fadeIn();
			$('#results').html(response);
		});
	}
	
	update_contact();
@stop