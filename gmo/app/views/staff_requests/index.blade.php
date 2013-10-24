@extends('layout')

@section('title')
View All Requests
@endsection

@section('content')

<div class="panel-body">
	<table class="table table-bordered">
		<tr class="header">
			<th>Request ID</th>
			<th>Plant Name</th>
			<th>Entrepreneur</th>
			<th>Current Process</th>
		</tr>


		@if(count($tableData) == 0)
		</table>
		<div class="row">
			<div class="col-lg-12 text-center"><strong>No Data</strong></div>
		</div>
		@else
		@foreach ($tableData as $request) 
		<tr>
			<td><a href="{{action('StaffRequestsController@show',array('id' =>$request['ID']))}}"</a>{{$request['Reference ID']}}</td>
			<td>{{$request['Plant Name']}}</td>
			<td>{{$request['Entrepreneur']}}</td>
			<td>{{$request['Current Process']}}</td>
		</tr>
		@endforeach
		</table>
		@endif
</div>

@endsection
