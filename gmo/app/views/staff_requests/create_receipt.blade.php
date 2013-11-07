@extends('layout')

@section('title')
Receipt
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
			<tr class="info" >
				<td>สทช. 1-1/1</td>
				<td class="text-right"><? $form1 = 100; echo $form1; ?></td>

			</tr>
			<tr class="info" >
				<td>สทช. 1-1/2</td>
				<td class="text-right">
				<?
					if($checkForm)
					 	$form2 = 150; 
					else 
						$form2 = 0;
					echo $form2;
				?>
				</td>
			</tr>
			<tr class="info" >
				<td><strong>Total</strong></td>
				<td class="text-right"><strong><? echo $form1+$form2; ?></strong></td>

			</tr>
		</tbody>
	</table>	

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