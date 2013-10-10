<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/common.css" rel="stylesheet">
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
</head>

<body>
<img class="logo" src = "/assets/img/logo.png">

<div class="container">
<nav class="navbar navbar-default " role="navigation">
  <div class="navbar-header">
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">HOME</a></li>
      <li><a href="#">REQUEST</a></li>
      <li><a href="#">AGENCY</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user">  Entreprenuer</span></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        	<span class="glyphicon glyphicon-cog"> Setting <b class="caret"></b></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Log out</a></li>

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
