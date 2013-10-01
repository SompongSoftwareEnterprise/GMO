
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bootstrap HTML Template</title>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/common.css" rel="stylesheet">
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

<script src="assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</body>
</html>
