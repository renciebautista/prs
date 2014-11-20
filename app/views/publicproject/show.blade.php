@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name', $project->project_name, array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
				</div>
				<div class="col-lg-6">
					{{ Form::label('assigned_to', 'Assigned To', array('class' => 'control-label')) }}
					{{ Form::text('assigned_to', UserHelper::fullname($project), array('class' => 'form-control', 'placeholder' => 'Assigned To', 'disabled' => '')) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot', ProjectHelper::ucwords($project->lot), array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street', ProjectHelper::ucwords($project->street), array('class' => 'form-control', 'placeholder' => 'Street', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy', ProjectHelper::ucwords($project->brgy), array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision', 'disabled' => '')) }}
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::text('city_id', CityHelper::cityProvince($project), array('class' => 'form-control', 'placeholder' => 'Project Name', 'disabled' => '')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
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
		var url = "{{ URL::to('contact/joinedlists',array('project_id' => $project->id)) }}/"+$(this).attr('id');
		$('.account_group').attr("href", url);
	});

	function update_contact(){
		$.get("{{ URL::to('api/project/joinedcontact',$project->id) }}", function(response){
			$('#results').fadeIn();
			$('#results').html(response);
		});
	}
	
	update_contact();
@stop