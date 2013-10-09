@extends('layout')

@section('title')
View All Requests
@endsection

@section('content')

<div class="panel-body">



	<table class="table table-bordered">
		<thead>
			<tr class="Header">
				<th>Request ID</th>
				<th>Importer Name</th>
				<th>Requester</th>
				<th>Sent Date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr >
				<td><a href="3">26</a></td>
				<td>Jeremy</td>
				<td>Bolshave Import Services</td>
				<td>24/9/2013</td>
				<td class="text-danger">Document Needed</td>
			</tr>
		</tbody>
	</table>

	<br><br>

	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Document</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>สทช. 1-1/1(<a href="#">Download</a>)</td>
						<td class="text-success">Available</td>
					</tr>
					<tr>
						<td>สทช. 1-1/2(<a href="#">Update</a>) </td>
						<td class="text-danger">Document Needed</td>
					</tr>
					<tr>
						<td>Invoice</td>
						<td class="text-warning">Pending</td>
					</tr>
					<tr>
						<td>Receipt</td>
						<td class="text-warning">Pending</td>
					</tr>

				</tbody>
			</table>

			<br><br>
			<button type="button" class="btn btn-default">Create Receipt</button>
			<button type="button" class="btn btn-disabled">Create Lab Task</button>
			<button type="button" class="btn btn-disabled">Create Analysis of Report</button>
			<button type="button" class="btn btn-disabled">Create Certificate</button>

		</div>
	</div>
</div>

@endsection