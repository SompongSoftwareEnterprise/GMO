@extends('layout')

@section('title')
Create Analysis Report
@endsection

@section('content')

<div class="panel-body ">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Analysis of Report</a></li>
		<li class="active">Create</li>
	</ol>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Sample Name</strong></div>
		<div class="col-xs-9">{{ $dmtCertReqEx['plant_name_eng'] }}</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Manufacturer or Shipper</strong></div>
		<div class="col-xs-9">{{ $dmtCertReqForm['company_en'] }}</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Address</strong></div>
		<div class="col-xs-9"> <address>
			{{ $dmtCertReqForm['address_en'] }}<br>
			{{ $dmtCertReqForm['address_en2'] }}<br>
			{{ $dmtCertReqForm['city_en'] }}, {{ $dmtCertReqForm['province_en'] }}, Thailand, {{ $dmtCertReqForm['zip'] }}<br>
			<abbr title="Phone">Phone :</abbr>{{ $dmtCertReqForm['contact_number'] }}
		</address></div>
	</div>
	<br>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Vendor or Consignee</strong></div>
		<div class="col-xs-9">{{ $dmtCertReqForm['company_en'] }}</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right"><strong>Address</strong></div>
		<div class="col-xs-9"> <address>
			{{ $dmtCertReqForm['address_en'] }}<br>
			{{ $dmtCertReqForm['address_en2'] }}<br>
			{{ $dmtCertReqForm['city_en'] }}, {{ $dmtCertReqForm['province_en'] }}, Thailand, {{ $dmtCertReqForm['zip'] }}<br>
			<abbr title="Phone">Phone :</abbr>{{ $dmtCertReqForm['contact_number'] }}
		</address></div>
	</div>

	<hr>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Description of Product</strong></div>
		<div class="col-xs-9">
			<p>{{ $dmtCertReqEx['plant_name_eng'] }}</p>
			<p>{{ $dmtCertReqEx['plant_name_th'] }}</p> 
			<p>{{ $dmtCertReqEx['plant_name_sci'] }}</p> 
		</div>
	</div>

	<hr>



	<div class="row">
		<div class="col-xs-3 text-right"><strong>Country of Origin</strong></div>
		<div class="col-xs-9">Thailand</div>
	</div>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Final Destination</strong></div>
		<div class="col-xs-9">{{ $dmtCertReqEx['export_to'] }}</div>
	</div>


	<div class="row">
		<div class="col-xs-3 text-right"><strong>Port of Entry or Embarkation</strong></div>
		<div class="col-xs-9">{{ $dmtCertReqEx['export_to'] }}</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-sm-offset-1 col-xs-3">
			<h3>Test Result</h3>
		</div>
	</div>

	<br>

	{{ Form::open(array('action' => array('StaffRequestsController@createResult', $dmtCertReqForm['domestic_certificate_request_id'], 'certificate'), 'class' => 'form-horizontal', 'id' => 'final-certificate-form')) }}
	<form class="form-horizontal" role="form">
		<div class="row">

			<div class="col-xs-3 text-right"><label for="sampleName">Sample Name</label></div>
			<div class="col-xs-4"><input type="text" placeholder="ex. Baby corn cut" class="form-control" id="sampleName" name="sample_name"></div>
		</div>
		<br>

		<div class="test-detail">
			<div class="row">

				<div class="col-xs-3 text-right"> 
					<label for="test">Test # <span data-test="number"></span></label>
				</div>
				<div class="col-xs-3">
				<select class="form-control" id="test_ex1" name="test_ex1">
						<option>Test Type</option>
						<option>Postitive Control</option>
						<option>Negative Control</option>
						<option>Condition Reaction</option>
					</select>
				</div>

				<div class="col-xs-2">
					<select class="form-control" id="result_ex1" name="result_ex1">
						<option>Result</option>
						<option>Positive</option>
						<option>Negative</option>
						<option>Satisfaction</option>
					</select>
				</div>

				<div class="form-group">
					<div class="col-xs-3">
						<button data-test="remove" id="removeTest" type="button" class="btn btn-danger">Remove</button>
						<button data-test="add" id="addTest" type="button" class="btn btn-primary"> Add Test</button>
					</div>
				</div>
			</div>
		</div>

<script>
	$(function() {
		var template = $('.test-detail').html()
		$(document).on('click', '[data-test="remove"]', function(e) {
			if ($('.test-detail').length == 1) {
				alert('Cannot remove last example')
			} else {
				$(this).closest('.test-detail').remove()
				updateNumber()
			}
		})
		var exId = 1
		$(document).on('click', '[data-test="add"]', function(e) {
			exId += 1
			$(this).closest('.test-detail').after(
				'<div class="test-detail">' +
					template.replace(/ex1/g, 'ex' + exId) +
				'</div>')
			updateNumber()
		})
		function updateNumber() {
			$('.test-detail').each(function(index) {
				$(this).find('[data-test="number"]').html(index + 1 + '')
			})
		}
	})
</script>


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
		<button type="reset" class="btn btn-danger">Reset</button>
		<button type="submit" class="btn btn-primary">Create Certificate</button>
	</div>
</div>
</form>

</div>

@endsection
