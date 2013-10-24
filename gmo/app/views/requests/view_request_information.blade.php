@extends('layout')

@section('title')
View Request Information
@endsection

@section('content')

<div class="panel-body">
	
	<table class="table table-bordered">
		<thead>
			{{ View::make('requests/table/header') }}
		</thead>
		<tbody>
			{{ View::make('requests/table/row')->with('certReq', $certReq); }}
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
						<td>สทช. 1-1/2 </td>
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
		</div>
	</div>
</div>
</div>

@endsection
