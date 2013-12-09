@extends('layout')

@section('title')
Receipt {{ $receipt->reference_id }}
@endsection

@section('content')

<div class="panel">
	<table class="table table-bordered"style=" width: 700px;" align="center">
		<thead>
			<tr class="Header" >
				<th>Item</th>
				<th style="width: 20%">Price (Baht)</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($price as $item)
			<tr class="info" >
				<td>{{ $item['name'] }}</td>
				<td class="text-right">{{ $item['price'] }}</td>
			</tr>
			@endforeach
			<tr class="info" >
				<td><strong>Total</strong></td>
				<td class="text-right"><strong>{{ $invoice->total_price }}</strong></td>
			</tr>
		</tbody>
	</table>	

	<br>

	<form class="form-horizontal" role="form">

		<div class="form-group">
			<div class="col-sm-offset-10 col-xs-2">
				<a href="{{ action('StaffRequestsController@index') }}" class="btn btn-default"> Back </a>
				<button class="btn btn-primary" type="button"> Print </button>
			</div>
		</div>

	</form>
</div>

@endsection
