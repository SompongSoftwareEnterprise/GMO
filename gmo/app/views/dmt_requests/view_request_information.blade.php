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
			<tr>
				<td>{{ $dmtCertReq->reference_id }}</a></td>
				<td>{{ $owner['first_name'] }} {{ $owner['last_name'] }}</td>
				<td>{{ $signer['first_name'] }} {{ $signer['last_name'] }}</td>
				<td>{{ $dmtCertReq->created_at }}</td>
				<?php if ($dmtCertReq->status == 'Pending') { ?>
					<td class="text-warning">{{ $dmtCertReq->status }}</td>
				<?php } else if ($dmtCertReq->status == 'Available') { ?>
					<td class="text-success">{{ $dmtCertReq->status }}</td>
				<?php } ?>
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
						<?php if ($dmtCertReqForm->status == 'Pending') { ?>
							<td>สทช. 1-2/1 & สทช. 1-2/2</td>
							<td class="text-warning">{{ $dmtCertReqForm->status }}</td>
						<?php } else if ($dmtCertReqForm->status == 'Available') { ?>
							<td>สทช. 1-2/1 & สทช. 1-2/2 (<a href="#">View</a>)</td>
							<td class="text-success">{{ $dmtCertReqForm->status }}</td>
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
					<tr>
						<td>Certificate</td>
						<td class="text-warning">Pending</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

@endsection
