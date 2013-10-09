@extends('layout')

@section('title')
View All Requests
@endsection

@section('content')

<div class="panel-body">
	<table class="table table-bordered">
		<tr class="header">
			<th>ID</th>
			<th>Plant Name</th>
			<th>Entrepreneur</th>
			<th>Current Process</th>
		</tr>
		<tr>
			<td><a href="#">0012</a></td>
			<td>Sprout</td>
			<td>Sompong Enterprise</td>
			<td>Nitrogen Test</td>
		</tr>
		<tr>
			<td><a href="#">0023</a></td>
			<td>Mandragora</td>
			<td>Monster Inc.</td>
			<td>Acid Test</td>
		</tr>
		<tr>
			<td><a href="#">0034</a></td>
			<td>TTD</td>
			<td>Natus Vincere</td>
			<td>Creep Test</td>
		</tr>
	</table>
</div>

@endsection
