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
				<td>{{$data['Request ID']}}</td>
				<td>{{$data['Importer Name']}}</td>
				<td>{{$data['Requester']}}</td>
				<td>{{$data['Sent Date']}}</td>
				@if($data['Status'] == 'Pending')
				<td class="text-warning">Pending</td>
				@elseif($data['Status'] == 'Document Needed')
				<td class="text-danger">Document Needed</td>
				@elseif($data['Status'] == 'Failed')
				<td class="text-danger">Failed</td>
				@else
				<td class="text-success">Passed</td>
				@endif
				<td></td>
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
						<td>สทช. 1-1/2(<a href="#">Download</a>) </td>
						<td class="text-success">Available</td>
					</tr>
					<tr>						
						@if($data['Invoice'] == 'Pending')
						<td>Invoice</td>
						<td class="text-warning">Pending</td>
						@else
						<td>Invoice(<a href="#">Download</a>)</td>
						<td class="text-success">Available</td>
						@endif
					</tr>
					<tr>

						@if($data['Receipt'] == 'Pending')
						<td>Receipt</td>
						<td class="text-warning">Pending</td>
						@else
						<td>Receipt(<a href="#">Download</a>)</td>
						<td class="text-success">Available</td>
						@endif

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
