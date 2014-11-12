
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Project Reference System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootstrap.css') }}
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootswatch.min.css') }}
		{{ HTML::style('assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css') }}
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
						@if(Auth::user()->hasRole("ADMIN"))
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">User Maintenance <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li>{{ HTML::linkRoute('user.index', 'User') }}</li>
								<li>{{ HTML::linkRoute('department.index', 'Department') }}</li>
								<li>{{ HTML::linkRoute('role.index', 'Role') }}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">File Maintenance <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li>{{ HTML::linkRoute('account-type.index', 'Account Type') }}</li>
							</ul>
						</li>
						@endif
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Projects <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li><a href="./sales/create">Public Projects</a></li>
								<li>{{ HTML::linkRoute('drafted-project.index', 'Drafted Projects') }}</li>
								<li><a href="./bootstrap.css">Assigned Projects</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Contacts <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li>{{ HTML::linkRoute('new-account.index', 'New Contact') }}</li>
								<li><a href="./bootstrap.css">My Contacts</a></li>
								<li>{{ HTML::linkRoute('account-approval.index', 'Contact Approval') }}</li>
							</ul>
						</li>

						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Accounts <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li>{{ HTML::linkRoute('new-account.index', 'New Accounts') }}</li>
								<li>{{ HTML::linkRoute('account.index', 'My Accounts') }}</li>
								<li>{{ HTML::linkRoute('account-approval.index', 'Account Approval') }}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Report <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="download">
								<li><a href="./sales/create">Sales Report</a></li>
								<li><a href="./bootstrap.css">Inventory Report</a></li>
							</ul>
						</li>
						<li>
							<a href="../help/">Help</a>
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
		<!-- {{ HTML::script('assets/plugins/twitter-bootstrap/js/bootswatch.js') }} -->
	</body>
</html>
