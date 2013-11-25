<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/common.css" rel="stylesheet">
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/common.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>

{{ View::make('debug') }}

<img class="logo pull-center" src = "/assets/img/logo_gmo.png">

<div class="container">
<nav class="navbar navbar-default " role="navigation">

    <ul class="nav navbar-nav">
      <li><a href="{{ action('HomeController@homePage') }}">HOME</a></li>
      <li><a href="{{ action('EntrepreneurRequestsController@index') }}">REQUEST</a></li>
      <li><a href="{{ action('EntrepreneurAccountController@index') }}">AGENCY</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ action('EntrepreneurAccountController@index') }}"><i class="glyphicon glyphicon-user"></i> {{$user_name}}</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        	<i class="glyphicon glyphicon-cog"></i> Setting <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ action('LoginController@index') }}">Log out</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->

</nav>
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
