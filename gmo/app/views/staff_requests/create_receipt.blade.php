<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
	<meta charset="utf-8">
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/common.css" rel="stylesheet">
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/promise-3.2.0.js"></script>
	<script src="/assets/js/common.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

</head>
<body>


<div class="container">
<div class="panel panel-default">
<!-- <div class="row-fluid"> -->
<div align="center"><img class="logo pull-center" src = "/assets/img/bird.png"></div>
<h1 align="center">Receipt</h1>
<p align="center">Official Department of Agriculture </p>
<div class="span3" style="margin:20px 500px">	
office………………………………
<br>date………………………………
</div>
<!-- </div> -->
<div class="panel">
	<table class="table table-bordered"style=" width: 500px;" align="center">
		<thead>
			<tr class="Header" >
				<th>List</th>
				<th style="width: 20%">Price (Baht)</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($price as $item)
			<tr class="info" >
				<td>{{ $item['name'] }}</td>
				<td class="text-right">{{ $item['price'] }}</td>
			</tr>
			@endforeach
			<tr class="info" >
				<td><strong>Total</strong></td>
				<td class="text-right"><strong>{{ $invoice->total_price }}</strong></td>
			</tr>
		</tbody>
	</table>	

	<br>

<div class="span3" style="margin: 20px 220px;"> <b>Total price:</b>  {{$invoice->total_price}} Baht.</div>
<div class="span3" style="margin:20px 500px">	
(name)...........................................payee
<br>(position).........................................
</div>
</div>
</div>
</div>
</body>
</html>


