
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Project Reference System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootstrap.css') }}
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootswatch.min.css') }}
		{{ HTML::style('assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css') }}
		{{ HTML::style('assets/plugins/colorbox/css/colorbox.css') }}
		{{ HTML::style('assets/css/style.css') }}
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
			<script src="../bower_components/respond/dest/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		.page-header{
			border-bottom: 1px solid #eeeeee;
		    margin: 0 0 20px;
		    padding-bottom: 9px;
		}
		.main{
			padding-top: 30px;
		}
		</style>
	</head>
	<body>
		<div class="container">
			@section('page-title')
			@if(isset($pagetitle))
	        <div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-12">
						<h2>{{ $pagetitle }}</h2>

					</div>

				</div>
			</div>
			@endif
	        @show
            


			@yield('content')
		</div>

		{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
		{{ HTML::script('assets/plugins/twitter-bootstrap/js/bootstrap.min.js') }}
		{{ HTML::script('assets/plugins/colorbox/js/jquery.colorbox-min.js') }}
		{{ HTML::script('assets/js/app.js') }}
		<!-- {{ HTML::script('assets/plugins/twitter-bootstrap/js/bootswatch.js') }} -->

		<script type="text/javascript">
		$(document).ready(function() {
		@section('page-script')

        @show
        });
        </script>
	</body>
</html>
