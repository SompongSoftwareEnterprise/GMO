<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/common.css" rel="stylesheet">
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/promise-3.2.0.js"></script>
	<script src="/assets/js/common.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>

{{ View::make('debug') }}

<img class="logo pull-center" src = "/assets/img/logo_gmo.png">

<div class="container">
@if ($user != null)
<nav class="navbar navbar-default " role="navigation">

    <ul class="nav navbar-nav">
      <li><a href="{{ action('HomeController@homePage') }}">HOME</a></li>
<!--      @if($user != null)-->
	      @if ($user->role == 'Customer' || $user->role == 'Agency')
		      <li id="en_req"><a href="{{ action('EntrepreneurRequestsController@index') }}">REQUEST</a></li>
	      @elseif ($user->role == 'GMO Staff')
		      <li id="en_req"><a href="{{ action('StaffRequestsController@index') }}">REQUEST</a></li>
		      <li id="en_req"><a href="{{ action('StaffReportController@index') }}">REPORT</a></li>
	      @elseif ($user->role == 'Lab Staff')
		      <li id="en_req"><a href="{{ action('LabController@index') }}">REQUEST</a></li>
		  @else
		  	<li id="en_req"></li>
	      @endif
<!--	  @endif-->
    </ul>

    <ul class="nav navbar-nav navbar-right">
    	@if ($user != null)
	    	<li><a id="account-link" href="{{ action('EntrepreneurAccountController@index') }}">
	    		<i class="glyphicon glyphicon-user"></i>{{$user->name}}
	    		@if ($user->role == 'Customer' || $user->role == 'Agency')
	    		<span class="label label-info">{{$user->role}}</span></a>
	    		@elseif ($user->role == 'GMO Staff')
	    		<span class="label label-success">{{$user->role}}</span></a>
	    		@else
	    		<span class="label label-danger">{{$user->role}}</span></a>
	    		@endif
	    		
	    	</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="glyphicon glyphicon-cog"></i> Setting <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{ action('EntrepreneurAccountController@index') }}">Account Info</a></li>
					<li><a href="{{ action('LoginController@index') }}">Log out</a></li>
				</ul>
			</li>
<!--		@endif-->
    </ul>
  </div><!-- /.navbar-collapse -->

</nav>
@endif
</div>

<div class="container">
	
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title">
			@yield('title')
		</h3>
	</div>

	<div class="panel-body">
		@yield('content')
	</div>
	
</div>

</body>
</html>
