@extends('layout')

@section('title')
Lab Task
@endsection

@section('content')

<div class="row">
	<div class="col-sm-12">
		<ul id="labTaskTab" class="nav nav-tabs">
			<li class="active"><a href="#labtask" data-toggle="tab">Lab Task</a></li>
			<li class=""><a href="#waitingforapproval" data-toggle="tab">Waiting For Approval</a></li>
		</ul>

		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="labtask">

				<br>
				<table class="table">
					<thead>
						<tr>
							<th>Task ID</th>
							<th>Task Name</th>
							<th>Due Date</th>
							<th>Status</th>
						</tr>
					</thead>


					@if(count($items[0]) == 0)
					<table>
					</table>
					<div class="row">
						<div class="col-lg-12 text-center"><strong>No Data</strong></div>
					</div>
					@else
					<tbody>
						@foreach ($items[0] as $labtask) 
							<tr>
							<td><a href="{{action('LabController@show',array('id' =>$labtask['taskid']))}}"</a>{{$labtask['taskid']}}</td>
							<td>{{$labtask['taskname']}}</td>
							<td>{{$labtask['duedate']}}</td>
							@if ($labtask['status'] == 'Pending')
								<td class="text-warning">{{$labtask['status']}}</td>
							@else
								<td>{{$labtask['status']}}</td>
							@endif
							</tr>
						@endforeach
					</tbody>
					@endif
				</table>

			</div>

			<div class="tab-pane fade" id="waitingforapproval">

				<br>
				<table class="table">
					<thead>
						<tr>
							<th>Task ID</th>
							<th>Task Name</th>
							<th>Due Date</th>
							<th>Status</th>
						</tr>
					</thead>

					@if(count($items[1]) == 0)
					<table>
					</table>
					<div class="row">
						<div class="col-lg-12 text-center"><strong>No Data</strong></div>
					</div>
					@else
					<tbody>
						@foreach ($items[1] as $labtask) 
							<tr>
							<td><a href="{{action('LabController@show',array('id' =>$labtask['taskid']))}}">{{$labtask['taskid']}}</a></td>
							<td>{{$labtask['taskname']}}</td>
							<td>{{$labtask['duedate']}}</td>
							<td class="text-warning">{{$labtask['status']}}</td>
							</tr>
						@endforeach
					</tbody>
					@endif
				</table>

			</div>
		</div>
	</div>
</div>


@endsection
