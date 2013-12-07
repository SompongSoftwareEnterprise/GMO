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
						<td>สท�?. 1-1/1  (<a href="/staff/requests/view/11/{{$data['Reference ID']}}">View</a>)</td>
						<td class="text-success">Available</td>
					</tr>
					<tr>
						@if($data['Info From'] == 1)
						<td>สท�?. 1-1/2  (<a href="/staff/requests/view/12/{{$data['Reference ID']}}">View</a>) </td>
						<td class="text-success">Available</td>
						@else
						<td>สท�?. 1-1/2</td>
						<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>						
						@if($data['Invoice'] != '0')
							<td>Invoice  (<a href="#">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Invoice</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>

						@if($data['Receipt'] != '0')
							<td>Receipt  (<a href="#">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Receipt</td>
							<td class="text-warning">Pending</td>
						@endif

					</tr>

					@else
					<tr>
						<td>สท�?. 1-2/1 & สท�?. 1-2/2 (<a href="/staff/requests/view/21/{{$data['Reference ID']}}">View</a>)</td>
						<td class="text-success">Available</td>
					</tr>
					<tr>						
						@if($data['Invoice'] != '0')
							<td>Invoice  (<a href="#">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Invoice</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>

						@if($data['Receipt'] != '0')
							<td>Receipt  (<a href="#">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Receipt</td>
							<td class="text-warning">Pending</td>
						@endif

					</tr>
					@endif

				</tbody>
			</table>
			</div>
			</div>
			<br><br>

			<div class="row text-center">

			<button type="button" class="btn btn-default"><a href="/staff/requests/{{ $data['ID'] }}/invoice">Create Invoice</a></button>
			<button type="button" class="btn btn-default"><a href="/staff/requests/{{ $data['ID'] }}/receipt">Create Receipt</a></button>
			<button type="button" class="btn btn-default"><a href="/staff/requests/{{ $data['ID'] }}/labtask/new">Create Lab Task</a></button>

			<button type="button" disabled class="btn btn-disabled">Create Analysis of Report</button>

			<button type="button" disabled class="btn btn-disabled">Create Certificate</button>

		</div>
	</div>

</div>

@endsection
