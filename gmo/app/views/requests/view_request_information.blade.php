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
				<td>{{ $certReq->reference_id }}</a></td>
				<td>{{ $owner['first_name'] }} {{ $owner['last_name'] }}</td>
				<td>{{ $signer['first_name'] }} {{ $signer['last_name'] }}</td>
				<td>{{ $certReq->created_at }}</td>
				<?php if ($certReq->status == 'Payment Required' || $certReq->status == 'Document Needed') { ?>
				<td class="text-danger">{{ $certReq->status }}</td>
				<?php } else if ($certReq->status == 'Available') { ?>
				<td class="text-success">{{ $certReq->status }}</td>
				<?php } else { ?>
				<td class="text-warning">{{ $certReq->status }}</td>
				<?php } ?>
			</tr>
			<!-- {{ View::make('requests/table/row')->with('certReq', $certReq); }} -->
		</tbody>
	</table>
	<br><br>

	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Document</th>
						<th class="col-xs-4">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php if ($certReqForm->status == 'Pending') { ?>
							<td>สทช. 1-1/1</td>
							<td class="text-warning">{{ $certReqForm->status }}</td>
						<?php } else if ($certReqForm->status == 'Available') { ?>
							<td>สทช. 1-1/1</td>
							<td class="text-success">Sent Request</td>
<!--							<td class="text-success">{{ $certReqForm->status }}</td>-->
						<?php } ?>
					</tr>
					<tr>
					<?php if ($certReqInfoForm != null) { ?>
						<?php if ($certReqInfoForm->status == 'Pending') { ?>
							<td>สทช. 1-1/2</td>
							<td class="text-warning">{{ $certReqInfoForm->status }}</td>
						<?php } else if ($certReqInfoForm->status == 'Available') { ?>
							<td>สทช. 1-1/2</td>
							<td class="text-success">Sent Request</td>
						<?php } ?>
					<?php } else { ?>
						<td>สทช. 1-1/2 (<a href="{{ action('EntrepreneurRequestsController@newRequestsInfo', array($certReq->reference_id)) }}">Complete this Document</a>)</td>
						<td class="text-danger">Document Needed</td>
					<?php } ?>
					</tr>
					<tr>
						@if($invoice != '0')
							<td>Invoice  (<a href="{{ action('EntrepreneurRequestsController@showInvoice', array($certReq->reference_id)) }}">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Invoice</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>

					<tr>
						@if($receipt != '0')
							<td>Receipt (<a href="{{ action('EntrepreneurRequestsController@showReceipt', array($certReq->reference_id)) }}">View</a>)</td>
							<td class="text-success">Available</td>
						@else
							<td>Receipt</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>
					<tr>
						@if ($certReq->status == 'Available')
							@if ($is_certificate == '0')
								<td>Analysis of Report (<a href="{{ action('EntrepreneurRequestsController@showResult', array($certReq->reference_id)) }}">View</a>)</td>
							@else
								<td>Certificate (<a href="{{ action('EntrepreneurRequestsController@showResult', array($certReq->reference_id)) }}">View</a>)</td>
							@endif
							<td class="text-success">Available</td>
						@else
							<td>Certificate</td>
							<td class="text-warning">Pending</td>
						@endif
					</tr>

				</tbody>
			</table>
<!--        show when certificate available-->
			@if ($certReq->status == 'complete')
            <div class="alert alert-success text-center">
            ติดต่อขอรับได้ที่ สำนักวิจัยพัฒนาเทคโนโลยีชีวภาพ ถนนรังสิต-นครนายก (คลองหก) <br>
            อำเภอธัญบุรี จังหวัดปทุมธานี 12110
            <br>
            โทร. 0-2904-6885-95 โทรสาร 0-2904-6885
            </div>
            @endif
                    
		</div>
	</div>
</div>
</div>

@endsection
