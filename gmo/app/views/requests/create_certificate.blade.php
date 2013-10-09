@extends('layout')

@section('title')
Create Certificate Request Form
@endsection

@section('content')

<div class="panel-body ">

	<div class="row">

		<div class="col-xs-2">
			<div class="btn-group-vertical">
				<button type="button" class="btn btn-active" data-toggle="#">
					<a href="#form_1">
						<span class="glyphicon glyphicon-file"></span>สทช 1-1/1
					</a>
				</button>
				<button type="button" class="btn btn-default" data-toggle="form_1">
					<a href="#form_2">
						<span class="glyphicon glyphicon-file"></span>สทช 1-1/2
					</a>
				</button>
			</div>
		</div>
		{{ Form::open(array('action' => array('EntrepreneurRequestsController@create', 1), 'class' => 'form-horizontal')) }}
		<div id="form_1" class="col-xs-10">
			<div class="panel panel-default">
				<div class="panel-body text-left">
					<h2>&nbsp;&nbsp;สทช 1-1/1</h2>
					<div class="row" style="margin-top: 30px;">
						<label class="col-xs-3 control-label text-right">
							Name
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->first_name }}
							{{ $entrepreneur->last_name }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Nationality 
						</label>
						<div class="col-xs-8  control-label">
							{{ $entrepreneur->nationality }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Address 
						</label>
						<div class="col-xs-8  control-label">
							{{ $entrepreneur->address1 }}<br>
							{{ $entrepreneur->address2 }}<br>
							{{ $entrepreneur->city }}, {{ $entrepreneur->province }}, {{ $entrepreneur->country }}, {{ $entrepreneur->zip }}<br>
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Phone
						</label>
						<div class="col-xs-8  control-label">
							{{ $entrepreneur->phone }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Mobile Phone
						</label>
						<div class="col-xs-8  control-label">
							{{ $entrepreneur->mobile }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Fax 
						</label>
						<div class="col-xs-8  control-label">
							{{ $entrepreneur->fax }}
						</div>
					</div>
					<hr>

					<!-- form -->
					<!--<form class="form-horizontal" role="form">-->

						<!-- Manufactory -->
						<div class="form-group">
							<label for="manufactoryName" class="col-xs-3 control-label ">
								Manufactory
							</label>
							<div class="col-xs-8">
								<input type="text" class="form-control" id="manufactoryName" name="manufactory_name" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="manufactory_address1" placeholder="Address Line 1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="manufactory_address2"  placeholder="Address Line 2">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" placeholder="Town/City">
							</div>
							<div class="col-xs-4 ">
								<select class="form-control" name="manufactory_province">
									<option>State/Province</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<select class="form-control" name="manufactory_country">
									<option>Country</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
							<div class="col-xs-4 ">
								<input type="text" class="form-control" name="manufactory_zip" placeholder="Zip Code (ex. 12345)">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="manufactory_phone" placeholder="Phone (ex. 0-2345-6789)">
							</div>
							<div class=" col-xs-4 ">
								<input type="text" class="form-control" name="manufactory_fax"  placeholder="Fax">
							</div>
						</div>

						<!-- Plant Warehouse -->
						<div class="form-group">
							<label for="plantWarehouseName" class="col-xs-3 control-label ">
								Plant Warehouse
							</label>
							<div class="col-xs-8 ">
								<input type="text" class="form-control" id="plantWarehouseName" name="warehouse_name" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="warehouse_address1"  placeholder="Address Line 1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="warehouse_address2" placeholder="Address Line 2">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="warehouse_city" placeholder="Town/City">
							</div>
							<div class="col-xs-4 ">
								<select class="form-control" name="warehouse_province">
									<option>State/Province</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<select class="form-control" name="warehouse_country">
									<option>Country</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
							<div class="col-xs-4 ">
								<input type="text" class="form-control" name="warehouse_zip" placeholder="Zip Code (ex. 12345)">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="warehouse_phone" placeholder="Phone (ex. 0-2345-6789)">
							</div>
							<div class=" col-xs-4 ">
								<input type="text" class="form-control" name="warehouse_fax" placeholder="Fax">
							</div>
						</div>

						<!-- Purpose -->
						<div class="form-group">
							<label class="col-xs-3 control-label">
								Purpose of Requesting a Certificate
							</label>
							<div class="col-xs-3">
								<input type="checkbox">&nbsp;&nbsp;Export
							</div>
							<div class="col-xs-3">
								<input type="checkbox">&nbsp;&nbsp;Import
							</div>
							<div class="col-xs-3">
								<input type="checkbox">&nbsp;&nbsp;Research
							</div>
							<div class="col-xs-3">
								<input type="checkbox">&nbsp;&nbsp;Industry
							</div>
							<div class="col-xs-3">
								<input type="checkbox">&nbsp;&nbsp;Comsumption
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-2">
								<input type="checkbox">&nbsp;&nbsp;Other
							</div>
							<div class="col-xs-6 ">
								<input type="text" class="form-control" placeholder="Fax">
							</div>
						</div>

						<!-- Contact -->
						<div class="form-group">
							<label for="contact" class="col-xs-3 control-label">
								Contact
							</label>
							<div class="col-xs-8 ">
								<input type="text" class="form-control" id="contact" name="contact_name" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="contact_phone" placeholder="Phone (ex. 0-2345-6789)">
							</div>
							<div class=" col-xs-4 ">
								<input type="email" class="form-control" name="contact_email" placeholder="E-mail">
							</div>
						</div>

						<!-- Receiver -->
						<div class="form-group">
							<label for="receiverName" class="col-xs-3 control-label ">
								Receiver
							</label>
							<div class="col-xs-8 ">
								<input type="text" class="form-control" id="receiverName" name="receiver_name" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="receiver_address1" placeholder="Address Line 1">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="receiver_address2" placeholder="Address Line 2">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="receiver_city" placeholder="Town/City">
							</div>
							<div class="col-xs-4 ">
								<select class="form-control" name="receiver_province">
									<option>State/Province</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<select class="form-control" name="receiver_country">
									<option>Country</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
							<div class="col-xs-4 ">
								<input type="text" class="form-control" name="receiver_zip" placeholder="Zip Code (ex. 12345)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								<input type="text" class="form-control" name="origin_of_plant" placeholder="Origin of Plant">
							</div>
						</div>

						<!-- Examples -->
						<div class="col-sm-offset-1">
							<h3>Example</h3>
						</div>
						<hr>
						<div class="example-detail">
							<div class="form-group">
								<label for="exampleType_ex1" class="col-xs-3 control-label">
									Example Detail # <span data-gmo-example="number">1</span>
								</label>
								<div class="col-xs-6">
									<input type="text" class="form-control" id="exampleType_ex1" name="example_type_ex1" placeholder="Type of Example">
								</div>
								<div class="col-xs-2 ">
									<input type="number" class="form-control" placeholder="Quantity" name="example_quantity_ex1">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-xs-8 ">
									<textarea class="form-control" placeholder="Detail" style="height: 95px" name="example_detail_ex1"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-7 col-xs-5">
									<button data-gmo-example="remove" type="button" class="btn btn-danger">Remove</button>
									<button data-gmo-example="add" type="button" class="btn btn-primary">Add Example</button>
								</div>
							</div>
						</div>
						<script>
							$(function() {
								var template = $('.example-detail').html()
								$(document).on('click', '[data-gmo-example="remove"]', function(e) {
									if ($('.example-detail').length == 1) {
										alert('Cannot remove last example')
									} else {
										$(this).closest('.example-detail').remove()
										updateNumber()
									}
								})
								var exId = 1
								$(document).on('click', '[data-gmo-example="add"]', function(e) {
									exId += 1
									$(this).closest('.example-detail').after(
										'<div class="example-detail">' +
											template.replace(/ex1/g, 'ex' + exId) +
										'</div>')
									updateNumber()
								})
								function updateNumber() {
									$('.example-detail').each(function(index) {
										$(this).find('[data-gmo-example="number"]').html(index + 1 + '')
									})
								}
							})
						</script>

						<hr>
						<div class="form-group">
							<div class="col-sm-offset-7 col-sm-5">
								<button type="button" class="btn btn-default">Back</button>
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					<!--</form>-->
				</div>
			</div>
		</div>
		{{ Form::close() }}

		{{ Form::open(array('action' => array('EntrepreneurRequestsController@create', 2), 'class' => 'form-horizontal')) }}
		<div id="form_2" class="col-sm-offset-2 col-xs-10">
			<div class="panel panel-default">
				<div class="panel-body text-left">
					<h2>&nbsp;&nbsp;สทช 1-1/2</h2>

					<div class="row" style="margin-top: 30px;">
						<label class="col-xs-3 control-label text-right">
							Manufacture or Shipper 
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->first_name }}
							{{ $entrepreneur->last_name }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Address 
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->address1 }}<br>
							{{ $entrepreneur->address2 }}<br>
							{{ $entrepreneur->city }}, {{ $entrepreneur->province }}, {{ $entrepreneur->country }}, {{ $entrepreneur->zip }}<br>
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Phone 
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->phone }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Mobile Phone 
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->mobile }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 control-label text-right">
							Fax 
						</label>
						<div class="col-xs-8 control-label">
							{{ $entrepreneur->fax }}
						</div>
					</div>

					<hr>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="commonName" class="col-xs-3 control-label ">
								Common Name
							</label>
							<div class="col-xs-8">
								<input type="text" class="form-control" id="commonName" name="common_name" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>
						<div class="form-group">
							<label for="vendorOrConsigneeName" class="col-xs-3 control-label ">
								Vendor or Consignee
							</label>
							<div class="col-xs-8">
								<input type="text" class="form-control" id="vendorOrConsigneeName" name="vendor_or_consignee" placeholder="Name (ex. Sompong Thepsoftware)">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8">
								<input type="text" class="form-control" name="address1" placeholder="Address Line 1">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8">
								<input type="text" class="form-control" name="address2" placeholder="Address Line 1">
							</div>
						</div>

						<div class="form-group">	
							<div class="col-sm-offset-3 col-xs-4">
								<input type="text" class="form-control" name="city" placeholder="Town/City">
							</div>
							<div class=" col-xs-4">
								<select class="form-control" name="province">
									<option>State/Province</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								<select class="form-control" name="country">
									<option>Country</option>
									<option>Negative Control</option>
									<option>Condition Reaction</option>
								</select>
							</div>
							<div class=" col-xs-4">
								<input type="text" class="form-control" name="zip" placeholder="Zip Code (ex. 12345)">
							</div>
						</div>

						<div class="form-group">
							<label for="descriptionOfProduct" class="col-xs-3 control-label ">
								Description of Product
							</label>
							<div class="col-xs-8">
								<textarea type="text" class="form-control" id="descriptionOfProduct" name="description_of_product" placeholder="Detail" style="height: 95px;"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="finalDestination" class="col-xs-3 control-label ">
								Final Destination
							</label>
							<div class="col-xs-8">
								<select class="form-control" id="finalDestination" name="final_destination">
									<option>State/Province</option>
									<option>Bangkok</option>	
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="portOfEntryOrEmbarktion" class="col-xs-3 control-label ">
								Port of Entry or Embarktion</label>
								<div class="col-xs-8">
									<select class="form-control" id="portOfEntryOrEmbarktion" name="port_of_entry">
										<option>Country</option>
										<option>Thailand</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-7 col-sm-5">
									<button type="button" class="btn btn-default">Back</button>
									<button type="reset" class="btn btn-danger">Reset</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<style type="text/css">
	.control-label {
		text-align: left;
	}
</style>

@endsection

