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
