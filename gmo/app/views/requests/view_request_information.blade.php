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
						<?php if ($certReqForm->status == 'Pending') { ?>
							<td>สทช. 1-1/1</td>
							<td class="text-warning">{{ $certReqForm->status }}</td>
						<?php } else if ($certReqForm->status == 'Available') { ?>
							<td>สทช. 1-1/1 (<a href="#">Download</a>)</td>
							<td class="text-success">{{ $certReqForm->status }}</td>
						<?php } ?>
					</tr>
					<tr>
						<?php if ($certReqInfoForm->status == 'Pending') { ?>
							<td>สทช. 1-1/2</td>
							<td class="text-warning">{{ $certReqInfoForm->status }}</td>
						<?php } else if ($certReqInfoForm->status == 'Available') { ?>
							<td>สทช. 1-1/2 (<a href="#">Download)</a></td>
							<td class="text-success">{{ $certReqInfoForm->status }}</td>
						<?php } ?>
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
