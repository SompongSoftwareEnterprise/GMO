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
				<?php if ($dmtCertReq->status == 'Payment Required' || $dmtCertReq->status == 'Document Needed') { ?>
				<td class="text-danger">{{ $dmtCertReq->status }}</td>
				<?php } else if ($dmtCertReq->status == 'Available') { ?>
				<td class="text-success">{{ $dmtCertReq->status }}</td>
				<?php } else { ?>
				<td class="text-warning">{{ $dmtCertReq->status }}</td>
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
							<td>สทช. 1-2/1 & สทช. 1-2/2 </td>
							<td class="text-success">{{ $dmtCertReqForm->status }}</td>
						<?php } ?>
					</tr>
					<tr>
						@if(!empty($invoice))
							<td>Invoice  (<a href="{{ action('EntrepreneurDomesticRequestsController@showInvoice', array($dmtCertReq->reference_id)) }}">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Invoice</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>
						@if(!empty($receipt))
							<td>Receipt (<a href="{{ action('EntrepreneurDomesticRequestsController@showReceipt', array($dmtCertReq->reference_id)) }}">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Receipt</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>
						@if ($dmtCertReq->status == 'Available')
							@if ($is_certificate == '0')
								<td>Analysis of Report (<a href="{{ action('EntrepreneurDomesticRequestsController@showResult', array($dmtCertReq->reference_id)) }}">View</a>)</td>
							@else
								<td>Certificate (<a href="{{ action('EntrepreneurDomesticRequestsController@showResult', array($dmtCertReq->reference_id)) }}">View</a>)</td>
							@endif
							<td class="text-success">Available</td>
						@else
							<td>Certificate</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

@endsection
