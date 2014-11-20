@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
	</div>
</div>
<div class="row">
	{{ Form::open(array('action' => 'DraftedProjectController@store','class' => 'bs-component')) }}
	<div class="col-lg-6">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					{{ Form::label('project_name', 'Project Name', array('class' => 'control-label')) }}
					{{ Form::text('project_name','',array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('account_address', 'Project Address', array('class' => 'control-label')) }}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('lot', 'Lot / Blk / House No. / Unit No.', array('class' => 'control-label')) }}
						{{ Form::text('lot','',array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('street', 'Street', array('class' => 'control-label')) }}
						{{ Form::text('street','',array('class' => 'form-control', 'placeholder' => 'Street')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('brgy', 'Brgy. / Subdivision', array('class' => 'control-label')) }}
						{{ Form::text('brgy','',array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						{{ Form::label('city_id', 'Town / City', array('class' => 'control-label')) }}
						{{ Form::select('city_id',$cities, null, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div id="map" style="height: 400px; width: 100%;"></div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::linkAction('DraftedProjectController@index', 'Back', array(), array('class' => 'btn btn-default')) }}
		</div>
	</div>
	{{ Form::close() }}
</div>


@stop

@section('page-script')
	/*var osm = new ol.layer.Tile({
	  source: new ol.source.OSM()
	});

	var map = new ol.Map({
	  layers: [
	    osm
	  ],
	  target: 'map',
	  view: new ol.View({
	    maxZoom: 19,
	    center: ol.proj.transform([121.09501, 14.56619], 'EPSG:4326', 'EPSG:3857'),
	    zoom: 15
	  })
	});*/

		var wmsLayer = new ol.layer.Tile({
            source: new ol.source.OSM()
        });

        var view = new ol.View({
        	maxZoom: 19,
            // center: [637125.42195, 8172199.19090669],
            center: ol.proj.transform([121.09501, 14.56619], 'EPSG:4326', 'EPSG:3857'),
            zoom: 14
        });
        //var iconGeometry = new ol.geom.Point([637125.42195, 8172199.19090669]);
        var iconGeometry = new ol.geom.Point(ol.proj.transform([121.09501, 14.56619], 'EPSG:4326', 'EPSG:3857'));
        var iconFeature = new ol.Feature({
            geometry: iconGeometry,
            name: 'Null Island',
            population: 4000,
            rainfall: 500
        });

        var iconStyle = new ol.style.Style({
            image: new ol.style.Icon(({
                anchor: [0.5, 41],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: '/assets/images/marker-icon.png'
            }))
        });

        iconFeature.setStyle(iconStyle);

        var vectorSource = new ol.source.Vector({
            features: [iconFeature]
        });

        var vectorLayer = new ol.layer.Vector({
            source: vectorSource
        });
        var map = new ol.Map({
            layers: [wmsLayer, vectorLayer],
            target: 'map',
            view: view,
            //controls: []
        });
        map.on('singleclick', function (evt) {
            iconGeometry.setCoordinates(evt.coordinate);
            console.log(ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326'));
        });

@stop