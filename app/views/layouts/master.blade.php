
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
		<link rel="stylesheet" href="http://openlayers.org/en/v3.0.0/css/ol.css" type="text/css">
		{{ HTML::style('assets/css/style.css') }}
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
			<script src="../bower_components/respond/dest/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		body {
			  padding-top: 50px;
			}
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
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="../" class="navbar-brand">Project Reference System</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						@if(Auth::user()->hasRole("ADMINISTRATOR"))
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Settings<span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li class="dropdown-header">User Maintenance</li>
								<li>{{ HTML::linkRoute('user.index', 'User') }}</li>
								<li>{{ HTML::linkRoute('department.index', 'Department') }}</li>
								<li>{{ HTML::linkRoute('role.index', 'Role') }}</li>
								<li class="divider"></li>
								<li class="dropdown-header">File Maintenance</li>
								<li>{{ HTML::linkRoute('account-type.index', 'Account Type') }}</li>
								<li>{{ HTML::linkRoute('account-group.index', 'Account Group') }}</li>
							</ul>
						</li>
						@endif
						@if(!Auth::user()->hasRole("ADMINISTRATOR"))
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Projects <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li>{{ HTML::linkAction('PublicProjectController@index', 'Public Projects') }}</li>
								<li>{{ HTML::linkAction('DraftedProjectController@index', 'Drafted Projects') }}</li>
								<li>{{ HTML::linkAction('AssignedProjectController@index', 'Assigned Projects') }}</li>
								<li>{{ HTML::linkAction('JoinedProjectController@index', 'Joined Projects') }}</li>
								<li class="divider"></li>
								<li>{{ HTML::linkAction('ProjectApprovalController@index', 'Approve Projects') }}</li>
								<li>{{ HTML::linkAction('ApproveContactController@index', 'Approve Project Contacts') }}</li>
							</ul>
						</li>

						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Account Directory<span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li>{{ HTML::linkRoute('account.index', 'Accounts') }}</li>
								<li>{{ HTML::linkRoute('contact.index', 'Contacts') }}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Report <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li><a href="./sales/create">Sales Report</a></li>
								<li><a href="./bootstrap.css">Inventory Report</a></li>
							</ul>
						</li>
						@endif
						<li>
							<a href="../help/">Help</a>
						</li>
						
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">{{ Auth::user()->getFullname() }} <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li><a href="./sales/create">Profile</a></li>
								<li>{{ HTML::link('/logout', 'Logout') }}</li>
							</ul>
						</li>
					</ul>

				</div>


			</div>
		</div>


		<div class="container">
			@section('page-title')
			@if(isset($pagetitle))
	        <div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-12">
						<h1>{{ $pagetitle }}</h1>

					</div>

				</div>
			</div>
			@endif
	        @show
            

			@if (Session::has('message'))
				<div class="alert alert-dismissable {{ Session::get('class') }}">
					<button class="close" data-dismiss="alert" type="button">×</button>
					{{ Session::get('message') }}
				</div>
            @endif

            @if (Session::get('error'))
	            <div class="alert alert-error alert-danger">
	                @if (is_array(Session::get('error')))
	                    {{ head(Session::get('error')) }}
	                @endif
	            </div>
	        @endif

            @if ($errors->any())
			    <ul>
			        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
			    </ul>
			@endif


			@yield('content')
		</div>

		{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
		{{ HTML::script('assets/plugins/twitter-bootstrap/js/bootstrap.min.js') }}
		{{ HTML::script('assets/plugins/colorbox/js/jquery.colorbox-min.js') }}
		<!-- {{ HTML::script('assets/plugins/twitter-bootstrap/js/bootswatch.js') }} -->
		<script src="http://openlayers.org/en/v3.0.0/build/ol.js" type="text/javascript"></script>
		{{ HTML::script('assets/js/highlight.js') }}
		{{ HTML::script('assets/js/map.js') }}
		{{ HTML::script('assets/js/app.js') }}
		<script type="text/javascript">
		$(document).ready(function() {
		@section('page-script')

        @show
        });
        </script>
	</body>
</html>
