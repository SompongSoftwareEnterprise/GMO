@extends('layout')

@section('title')
Registration
@endsection

@section('content')

<div class="row">
	<div class="col-sm-3 text-right"><strong>Product Name :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['product_name'] }}</div>
</div>

<div class="row">
	<div class="col-sm-3 text-right"><strong>Product Code :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['product_code'] }}</div>
</div>
<div class="row">
	<div class="col-sm-3 text-right"><strong>Measure (g) :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['measure'] }} g</div>
</div>
<div class="row">
	<div class="col-sm-3 text-right"><strong>Volume (mL) :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['volume'] }} mL</div>
</div>
<div class="row">
	<div class="col-sm-3 text-right"><strong>Date Start :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['start'] }}</div>
</div>
<div class="row">
	<div class="col-sm-3 text-right"><strong>Date Finish :</strong></div>
	<div class="col-sm-8">{{  $labtaskProduct['finish'] }}</div>
</div>



<div class="row">
	<div class="col-sm-3 text-right"><strong>Responsible :</strong></div>
	<div class="col-sm-9">1. {{$labtaskAssignment[0]['assignee']}}</div>
</div>

@if(sizeof($labtaskAssignment) > 1)
@for($i = 1; $i < sizeof($labtaskAssignment); $i++)
<div class="row">
	<div class="col-md-offset-3 col-sm-8">{{$i + 1}}. {{$labtaskAssignment[$i]['assignee']}}</div>
</div>
@endfor
@endif
<div class="row">
	<div class="col-sm-3 text-right"><strong>Medthod Of Extracting DNA :</strong></div>
	<div class="col-sm-8">{{$labtask['dna_extraction_method']}}</p></div>
</div>

<hr>

<div class="row">
	<div class="col-sm-offset-1 col-xs-4">
		<h3>Analysis of Gene</h3>
	</div>
</div>

<div class="row">
	<div class="col-sm-3 text-right"><strong>Endogenous :</strong></div>
	<div class="col-sm-8">{{$labtask['endogenous']}}</p></div>
</div>

<div class="row">
	<div class="col-sm-3 text-right"><strong>Transgene :</strong></div>
	<div class="col-sm-8">1. {{explode('|',$labtask['transgene'])[0]}}</div>
</div>

@if(sizeof(explode('|',$labtask['transgene'])) > 1)
@for($i = 1; $i < sizeof(explode('|',$labtask['transgene'])); $i++)
<div class="row">
	<div class="col-md-offset-3 col-sm-8">{{$i + 1}}. {{explode('|',$labtask['transgene'])[$i]}}</div>
</div>
@endfor
@endif

<hr>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-8">
		@if($statuslist['Pending'] == 'Pending')
		<button type="button" class="btn btn-muted btn-lg btn-block">Start Analyzing Sequence</button>
		@elseif($statuslist['Pending'] == 'Completed')
		<button type="button" class="btn btn-muted btn-lg btn-block disabled">Start Analyzing Sequence</button>
		@endif
		<br>
	</div>
	<div class="col-sm-offset-2 col-sm-8">


		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Lab Analyzing Sequence</th>
					<th>Experiment Document</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1. DNA Extraction</td>
					@if($statuslist['DNA Extraction'] == 'Pending')
					<td class="text-warning">Pending(<a href="#">Upload</a>)</td>
					@elseif($statuslist['DNA Extraction'] == 'Completed')
					<td class="text-success">Uploaded(<a href="#">Download</a>)</td>
					@else
					<td class="text-danger">Waiting for above sequence</td>
					@endif
				</tr>
				<tr>
					<td>2. Volume & Concentration Measurement</td>
					@if($statuslist['Volume & Concentration Measurement'] == 'Pending')
					<td class="text-warning">Pending(<a href="#">Upload</a>)</td>
					@elseif($statuslist['Volume & Concentration Measurement'] == 'Completed')
					<td class="text-success">Uploaded(<a href="#">Download</a>)</td>
					@else
					<td class="text-danger">Waiting for above sequence</td>
					@endif
				</tr>
				<tr>
					<td>3. Endrogenous Gene Analysis</td>
					@if($statuslist['Endrogenous Gene Analysis'] == 'Pending')
					<td class="text-warning">Pending(<a href="#">Upload</a>)</td>
					@elseif($statuslist['Endrogenous Gene Analysis'] == 'Completed')
					<td class="text-success">Uploaded(<a href="#">Download</a>)</td>
					@else
					<td class="text-danger">Waiting for above sequence</td>
					@endif
				</tr>
				<tr>
					<td>4. Gene Analysis</td>
					@if($statuslist['Gene Analysis'] == 'Pending')
					<td class="text-warning">Pending(<a href="#">Upload</a>)</td>
					@elseif($statuslist['Gene Analysis'] == 'Completed')
					<td class="text-success">Uploaded(<a href="#">Download</a>)</td>
					@else
					<td class="text-danger">Waiting for above sequence</td>
					@endif
				</tr>

			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="form-group">
		@if($statuslist['Waiting For Approval'] == 'Pending')
		<div class="col-sm-offset-1 col-sm-5">
			<button type="button" class="btn btn-success btn-lg btn-block">Pass</button>
		</div>
		<div class="col-sm-offset-0 col-sm-5">
			<button type="button" class="btn btn-danger btn-lg btn-block">Fail</button>
		</div>
		@else
		<div class="col-sm-offset-1 col-sm-5">
			<button type="button" class="btn btn-success btn-lg btn-block disabled">Pass</button>
		</div>
		<div class="col-sm-offset-0 col-sm-5">
			<button type="button" class="btn btn-danger btn-lg btn-block disabled">Fail</button>
		</div>
		@endif

	</div>
</div>

@endsection
