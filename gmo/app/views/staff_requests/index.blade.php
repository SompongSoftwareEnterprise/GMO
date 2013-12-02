@extends('layout')

@section('title')
View Requests Information
@endsection

@section('content')

<div class="panel-body">
	<table class="table table-bordered">
		<thead>
				<tr class="header">
					<th>Request ID</th>
					<th>Plant Name</th>
					<th>Entrepreneur</th>
					<th>Status</th>
				</tr>
		</thead>


		@if(count($tableData) == 0)
		</table>
		<div class="row">
			<div class="col-lg-12 text-center"><strong>No Data</strong></div>
		</div>
		@else
			@foreach ($tableData as $request) 
			<tr>
				<!-- <td><a href="{{action('StaffRequestsController@show',array('id' =>$request['ID']))}}"</a>{{$request['Reference ID']}}</td> -->
				<td><a href="/staff/requests/{{ $request['Reference ID'] }}">{{ $request['Reference ID'] }}</a></td>
				<td>{{$request['Plant Name']}}</td>
				<td>{{$request['Entrepreneur']}}</td>
				@if ($request['Current Process'] == 'Available')
					<td class="text-success">{{$request['Current Process']}}</td>
				@elseif ($request['Current Process'] == 'Pending')
					<td class="text-warning">{{$request['Current Process']}}</td>
				@endif
			</tr>
			@endforeach
		</table>
		@endif
</div>

@endsection
