@extends('layout')

@section('title')
Create Analysis Report
@endsection

@section('content')

<div class="panel-body ">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Certificate</a></li>
		<li class="active">Create</li>
	</ol>



	<div class="row">
		<div class="col-xs-3 text-right"><strong>Sample Name</strong></div>
		<div class="col-xs-9">Baby corn cut</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Manufacturer or Shipper</strong></div>
		<div class="col-xs-9">AGRO-ON(THAILAND) CO.,LTD</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Address</strong></div>
		<div class="col-xs-9"> <address>
			795 Folsom Ave, Suite 600<br>
			San Francisco, CA 94107<br>
			<abbr title="Phone">P:</abbr> (123) 456-7890
		</address></div>
	</div>
	<br>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Vendor or Consignee</strong></div>
		<div class="col-xs-9">AGRO-ON(THAILAND) CO.,LTD</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Address</strong></div>
		<div class="col-xs-9"> <address>
			795 Folsom Ave, Suite 600<br>
			San Francisco, CA 94107<br>
			<abbr title="Phone">P:</abbr> (123) 456-7890
		</address></div>
	</div>

	<hr>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Description of Product</strong></div>
		<div class="col-xs-9">
			BABY CORN CUT 6/108 OZ.  CANNED BABY CORN IN BRINE  ORIGIN: THALAND BABY CORN CUT 6/108 OZ.  CANNED BABY CORN IN BRINE  ORIGIN: THALAND BABY CORN CUT 6/108 OZ.  CANNED BABY CORN IN BRINE  ORIGIN: THALAND
		</div>
	</div>

	<hr>



	<div class="row">
		<div class="col-xs-3 text-right"><strong>Country of Origin</strong></div>
		<div class="col-xs-9">THALAND</div>
	</div>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Final Destination</strong></div>
		<div class="col-xs-9">THALAND</div>
	</div>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Port of Entry or Embarkation</strong></div>
		<div class="col-xs-9">THALAND</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-sm-offset-1 col-xs-3">
			<h3>Test Result</h3>
		</div>
	</div>

	<br>

	<form class="form-horizontal" role="form">
		<div class="row">

			<div class="col-xs-3 text-right"><label for="sampleName">Sample Name</label></div>
			<div class="col-xs-4"><input type="text" placeholder="ex. Baby corn cut" class="form-control" id="sampleName" name="sample_name"></div>
		</div>
		<br>

		<div class="row">

			<div class="col-xs-3 text-right"> <label for="test">Test # 1</label></div>
			<div class="col-xs-3"><select class="form-control" id="test" name="test">
				<option>Test Type</option>
				<option>Postitive Control</option>
				<option>Negative Control</option>
				<option>Condition Reaction</option>
			</select>
		</div>

		<div class="col-xs-2"><select class="form-control" id="result" name="result">
			<option>Result</option>
			<option>Positive</option>
			<option>Negative</option>
			<option>Satisfaction</option>
		</select>
	</div>

	<div class="form-group">
		<div class="col-xs-3">
			<button id="removeTest" type="button" class="btn btn-danger">Remove</button>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-xs-3 text-right"> <label for="test">Test # 2</label></div>
	<div class="col-xs-3"><select class="form-control" id="test" name="test">
		<option>Test Type</option>
		<option>Postitive Control</option>
		<option>Negative Control</option>
		<option>Condition Reaction</option>
	</select>
</div>

<div class="col-xs-2"><select class="form-control" id="result" name="result">
	<option>Result</option>
	<option>Positive</option>
	<option>Negative</option>
	<option>Satisfaction</option>
</select>
</div>

<div class="form-group">
	<div class="col-xs-3">
		<button id="removeTest" type="button" class="btn btn-danger">Remove</button>
		<button id="addTest" type="button" class="btn btn-primary"> Add Test</button>
	</div>
</div>
</div>


<br>
<div class="row">

	<div class="col-xs-3 text-right"> <label for="conclusion">Conclusion</label></div>
	<div class="col-xs-7">
		<textarea class="form-control" id="conclusion" name="conclusion" placeholder="Conclusion" style="height: 95px"></textarea>
	</div>
</div>

<br>
<div class="form-group row">
	<div class="col-xs-12 text-right">
		<button type="button" class="btn btn-default">Back</button>
		<button type="button" class="btn btn-danger">Reset</button>
		<button type="button" class="btn btn-primary">Create Certificate</button>
	</div>
</div>
</form>

</div>

@endsection