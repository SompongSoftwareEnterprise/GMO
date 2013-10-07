@extends('layout')

@section('title')
Registration
@endsection

@section('content')

{{print($labtasks)}}

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
					<tbody>
						<tr>
							<td><a href="#">0001</a></td>
							<td>Task name 0001</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Pending</td>
						</tr>
						<tr>
							<td><a href="#">0002</a></td>
							<td>Task name 0002</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Pending</td>
						</tr>
						<tr>
							<td><a href="#">0003</a></td>
							<td>Task name 0003</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Pending</td>
						</tr>
						<tr>
							<td><a href="#">0004</a></td>
							<td>Task name 0004</td>
							<td>dd/mm/yyyy</td>
							<td>Analyzing</td>
						</tr>
						<tr>
							<td><a href="#">0005</a></td>
							<td>Task name 0005</td>
							<td>dd/mm/yyyy</td>
							<td>Analyzing</td>
						</tr>
						<tr>
							<td><a href="#">0006</a></td>
							<td>Task name 0006</td>
							<td>dd/mm/yyyy</td>
							<td>Analyzing</td>
						</tr>
					</tbody>
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
					<tbody>
						<tr>
							<td><a href="#">0011</a></td>
							<td>Task name 0001</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Waiting For Approval</td>
						</tr>
						<tr>
							<td><a href="#">0012</a></td>
							<td>Task name 0002</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Waiting For Approval</td>
						</tr>
						<tr>
							<td><a href="#">0013</a></td>
							<td>Task name 0003</td>
							<td>dd/mm/yyyy</td>
							<td class="text-warning">Waiting For Approval</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>


@endsection