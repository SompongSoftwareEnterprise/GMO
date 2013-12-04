@extends('layout')

@section('title')
View Requests Information
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
				<td>{{$data['Reference ID']}}</td>
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
					<td class="text-success">{{$data['Status']}}</td>
				@endif
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
					@if($data['Request From'] == '1')
					<tr>
						<td>สทช. 1-1/1(<a href="#">view</a>)</td>
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

					@else
					<tr>
						<td>สทช. 1-1/1(<a href="#">view</a>)</td>
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
					@endif

				</tbody>
			</table>
			<br><br>
			<button type="button" class="btn btn-default"><a href="/staff/requests/{{ $data['ID'] }}/receipt">Create Receipt</a></button>
			<button type="button" class="btn btn-default"><a href="/staff/requests/{{ $data['ID'] }}/labtask/new">Create Lab Task</a></button>

			<button type="button" disabled class="btn btn-disabled">Create Analysis of Report</button>

			<button type="button" disabled class="btn btn-disabled">Create Certificate</button>

		</div>
	</div>
</div>

@endsection
