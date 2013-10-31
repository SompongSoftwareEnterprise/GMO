@extends('layout')

@section('title')
Create Certificate Request Form
@endsection

@section('content')

<div class="panel-body ">

	{{ View::make('errors_row') }}

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
		{{ Form::open(array(
			'action' => array('EntrepreneurRequestsController@create'),
			'class' => 'form-horizontal',
			'id' => 'new-request-form',
		)) }}
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
							<!--<label for="manufactoryName" class="col-xs-3 control-label ">
								Manufactory
							</label>-->
							{{ Form::label('manufactory_name', 'Manufactory', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::text('manufactory_name', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Sompong Thepsoftware)')) }}
								<!--<input type="text" class="form-control" id="manufactoryName" name="manufactory_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('manufactory_address1', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
								<!--<input type="text" class="form-control" name="manufactory_address1" placeholder="Address Line 1">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('manufactory_address2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
								<!--<input type="text" class="form-control" name="manufactory_address2"  placeholder="Address Line 2">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('manufactory_city', null, array('class' => 'form-control', 'placeholder' => 'Town/City')) }}
								<!--<input type="text" class="form-control" name="manufactory_city" placeholder="Town/City">-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::select('manufactory_province', array('State/Province' => '', 'Bangkok' => 'Bangkok'), null, array('class' => 'form-control')) }}
								<!--<select class="form-control" name="manufactory_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::select('manufactory_country', array(
									'Country' => '',
									'Thailand' => 'Thailand'
									), null, 
									array('class' => 'form-control')) }}
								<!--<select class="form-control" name="manufactory_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::text('manufactory_zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
								<!--<input type="text" class="form-control" name="manufactory_zip" placeholder="Zip Code (ex. 12345)">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('manufactory_phone', null, array('class' => 'form-control', 'placeholder' => 'Phone (ex. 02-345-6789)')) }}
								<!--<input type="text" class="form-control" name="manufactory_phone" placeholder="Phone (ex. 0-2345-6789)">-->
							</div>
							<div class=" col-xs-4 ">
								{{ Form::text('manufactory_fax', null, array('class' => 'form-control', 'placeholder' => 'Fax (ex. 02-345-6789)')) }}
								<!--<input type="text" class="form-control" name="manufactory_fax"  placeholder="Fax">-->
							</div>
						</div>

						<!-- Plant Warehouse -->
						<div class="form-group">
							<!--<label for="plantWarehouseName" class="col-xs-3 control-label ">
								Plant Warehouse
							</label>-->
							{{ Form::label('warehouse_name', 'Manufactory', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8 ">
								{{ Form::text('warehouse_name', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Warehouse Bangkok)')) }}
								<!--<input type="text" class="form-control" id="plantWarehouseName" name="warehouse_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('warehouse_address1', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
								<!--<input type="text" class="form-control" name="warehouse_address1"  placeholder="Address Line 1">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('warehouse_address2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
								<!--<input type="text" class="form-control" name="warehouse_address2" placeholder="Address Line 2">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('warehouse_city', null, array('class' => 'form-control', 'placeholder' => 'Town/City')) }}
								<!--<input type="text" class="form-control" name="warehouse_city" placeholder="Town/City">-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::select('warehouse_province', array(
									'' => 'State/Province',
									'Bangkok' => 'Bangkok'
									), null, 
									array('class' => 'form-control')) }}
								<!--<select class="form-control" name="warehouse_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::select('warehouse_country', array(
									'' => 'Country',
									'Thailand' => 'Thailand'
									), null, 
									array('class' => 'form-control')) }}
								<!--<select class="form-control" name="warehouse_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::text('warehouse_zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
								<!--<input type="text" class="form-control" name="warehouse_zip" placeholder="Zip Code (ex. 12345)">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('warehouse_phone', null, array('class' => 'form-control', 'placeholder' => 'Phone (ex. 02-392-4892)')) }}
								<!--<input type="text" class="form-control" name="warehouse_phone" placeholder="Phone (ex. 0-2345-6789)">-->
							</div>
							<div class=" col-xs-4 ">
								{{ Form::text('warehouse_fax', null, array('class' => 'form-control', 'placeholder' => 'Fax (ex. 02-389-2934)')) }}
								<!--<input type="text" class="form-control" name="warehouse_fax" placeholder="Fax">-->
							</div>
						</div>

						<!-- Purpose -->
						<div class="form-group">
							<!--<label class="col-xs-3 control-label">
								Purpose of Requesting a Certificate
							</label>-->
							{{ Form::label('purpose[]', 'Manufactory', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-3">
								{{ Form::checkbox('purpose[]', 'Export') }}&nbsp;&nbsp;Export
								<!--<input type="checkbox" name="purpose[]" value="Export">&nbsp;&nbsp;Export-->
							</div>
							<div class="col-xs-3">
								{{ Form::checkbox('purpose[]', 'Import') }}&nbsp;&nbsp;Import
								<!--<input type="checkbox" name="purpose[]" value="Import">&nbsp;&nbsp;Import-->
							</div>
							<div class="col-xs-3">
								{{ Form::checkbox('purpose[]', 'Research') }}&nbsp;&nbsp;Research
								<!--<input type="checkbox" name="purpose[]" value="Research">&nbsp;&nbsp;Research-->
							</div>
							<div class="col-xs-3">
								{{ Form::checkbox('purpose[]', 'Industry') }}&nbsp;&nbsp;Industry
								<!--<input type="checkbox" name="purpose[]" value="Industry">&nbsp;&nbsp;Industry-->
							</div>
							<div class="col-xs-3">
								{{ Form::checkbox('purpose[]', 'Consumption') }}&nbsp;&nbsp;Consumption
								<!--<input type="checkbox" name="purpose[]" value="Comsumption">&nbsp;&nbsp;Comsumption-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-2">
								{{ Form::checkbox('purpose[]', 'Other') }}&nbsp;&nbsp;Other
								<!--<input type="checkbox" name="other_checkbox" value="Other">&nbsp;&nbsp;Other-->
							</div>
							<div class="col-xs-6 ">
								{{ Form::text('other', null, array('class' => 'form-control')) }}
								<!--<input type="text" class="form-control" name="other">-->
							</div>
						</div>

						<!-- Contact -->
						<div class="form-group">
							<!--<label for="contact" class="col-xs-3 control-label">
								Contact
							</label>-->
							{{ Form::label('contact_name', 'Contact', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8 ">
								{{ Form::text('contact_name', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Sompong Thepsoftware)')) }}
								<!--<input type="text" class="form-control" id="contact" name="contact_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('contact_phone', null, array('class' => 'form-control', 'placeholder' => 'Phone (ex. 02-349-2893)')) }}
								<!--<input type="text" class="form-control" name="contact_phone" placeholder="Phone (ex. 0-2345-6789)">-->
							</div>
							<div class=" col-xs-4 ">
								{{ Form::text('contact_email', null, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
								<!--<input type="email" class="form-control" name="contact_email" placeholder="E-mail">-->
							</div>
						</div>

						<!-- Receiver -->
						<div class="form-group">
							<!--<label for="receiverName" class="col-xs-3 control-label ">
								Receiver
							</label>-->
							{{ Form::label('receiver_name', 'Receiver', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::text('receiver_name', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Sompong Thepsoftware)')) }}
								<!--<input type="text" class="form-control" id="receiverName" name="receiver_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('receiver_address1', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
								<!--<input type="text" class="form-control" name="receiver_address1" placeholder="Address Line 1">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('receiver_address2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
								<!--<input type="text" class="form-control" name="receiver_address2" placeholder="Address Line 2">-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('receiver_city', null, array('class' => 'form-control', 'placeholder' => 'Town/City')) }}
								<!--<input type="text" class="form-control" name="receiver_city" placeholder="Town/City">-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::select('receiver_province', array(
									'' => 'State/Province',
									'Bangkok' => 'Bangkok'
									), null, 
									array('class' => 'form-control')) 
								}}
								<!--<select class="form-control" name="receiver_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::select('receiver_country', array(
									'' => 'Country',
									'Thailand' => 'Thailand'
									), null, 
									array('class' => 'form-control')) 
								}}
								<!--<select class="form-control" name="receiver_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
							</div>
							<div class="col-xs-4 ">
								{{ Form::text('receiver_zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
								<!--<input type="text" class="form-control" name="receiver_zip" placeholder="Zip Code (ex. 12345)">-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8 ">
								{{ Form::text('origin_of_plant', null, array('class' => 'form-control', 'placeholder' => 'Origin of Plant')) }}
								<!--<input type="text" class="form-control" name="origin_of_plant" placeholder="Origin of Plant">-->
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

						<!--<hr>-->
						<!--<div class="form-group">
							<div class="col-sm-offset-7 col-sm-5">
								<button type="button" class="btn btn-default">Back</button>
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
						-_>
					<!--</form>-->
				</div>
			</div>
		</div>

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
							<!--<label for="commonName" class="col-xs-3 control-label ">
								Common Name
							</label>-->
							{{ Form::label('common_name', 'Common Name', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								<!--<input type="text" class="form-control" id="commonName" name="common_name" placeholder="Plant Name (ex. Onion)">-->
								{{ Form::text('common_name', null, array('class' => 'form-control', 'placeholder' => 'Plant Name (ex. Onion)')) }}
							</div>
						</div>
						<div class="form-group">
							<!-- <label for="vendorOrConsigneeName" class="col-xs-3 control-label "> -->
							<!-- 	Vendor or Consignee -->
							<!-- </label> -->
							{{ Form::label('vendor_or_consignee', 'Vendor or Consignee', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::text('vendor_or_consignee', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Sompong Thepsoftware)')) }}
								<!-- <input type="text" class="form-control" id="vendorOrConsigneeName" name="vendor_or_consignee" placeholder="Name (ex. Sompong Thepsoftware)"> -->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8">
								{{ Form::text('address1', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
								<!-- <input type="text" class="form-control" name="address1" placeholder="Address Line 1"> -->
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-8">
								{{ Form::text('address2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
								<!-- <input type="text" class="form-control" name="address2" placeholder="Address Line 1"> -->
							</div>
						</div>

						<div class="form-group">	
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Town/City')) }}
								<!-- <input type="text" class="form-control" name="city" placeholder="Town/City"> -->
							</div>
							<div class=" col-xs-4">
								{{ Form::select('province', array(
									'' => 'State/Province',
									'Bangkok' => 'Bangkok'
									), null, 
									array('class' => 'form-control')) 
								}}
								<!-- <select class="form-control" name="province"> -->
								<!-- 	<option>State/Province</option> -->
								<!-- 	<option>Bangkok</option> -->
								<!-- 	<option>Pathumthani</option> -->
								<!-- </select> -->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-xs-4">
								{{ Form::select('country', array(
									'' => 'Country',
									'Thailand' => 'Thailand'
									), null, 
									array('class' => 'form-control')) 
								}}
								<!-- <select class="form-control" name="country"> -->
								<!-- 	<option>Country</option> -->
								<!-- 	<option>Thailand</option> -->
								<!-- 	<option>Laos</option> -->
								<!-- </select> -->
							</div>
							<div class=" col-xs-4">
								{{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
								<!-- <input type="text" class="form-control" name="zip" placeholder="Zip Code (ex. 12345)"> -->
							</div>
						</div>

						<div class="form-group">
							<!-- <label for="descriptionOfProduct" class="col-xs-3 control-label "> -->
							<!-- 	Description of Product -->
							<!-- </label> -->
							{{ Form::label('description_of_product', 'Description of Product', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::text('description_of_product', null, array('class' => 'form-control', 'placeholder' => 'Detail')) }}
								<!-- <textarea type="text" class="form-control" id="descriptionOfProduct" name="description_of_product" placeholder="Detail" style="height: 95px;"></textarea> -->
							</div>
						</div>

						<div class="form-group">
							<label for="finalDestination" class="col-xs-3 control-label ">
								Final Destination
							</label>
							{{ Form::label('final_destination', 'Final Destination', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::select('province', array(
									'' => 'State/Province',
									'Bangkok' => 'Bangkok'
									), null, 
									array('class' => 'form-control')) 
								}}
								<!-- <select class="form-control" id="finalDestination" name="final_destination"> -->
								<!-- 	<option>State/Province</option> -->
								<!-- 	<option>Bangkok</option>	 -->
								<!-- </select> -->
							</div>
						</div>

						<div class="form-group">
							<!-- <label for="portOfEntryOrEmbarktion" class="col-xs-3 control-label "> -->
								<!-- Port of Entry or Embarktion</label> -->
							{{ Form::label('port_of_entry', 'Port of Entry or Embarktion', array('class' => 'col-xs-3', 'control-label')) }}

								<div class="col-xs-8">
									{{ Form::select('country', array(
										'' => 'Country',
										'Thailand' => 'Thailand'
										), null, 
										array('class' => 'form-control')) 
									}}
									<!-- <select class="form-control" id="portOfEntryOrEmbarktion" name="port_of_entry"> -->
									<!-- 	<option>Country</option> -->
									<!-- 	<option>Thailand</option> -->
									<!-- </select> -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-7 col-sm-5">
									<a href="{{ action('EntrepreneurRequestsController@index') }}" class="btn btn-default">Back</a>
									<button type="reset" class="btn btn-danger">Reset</button>
									<button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
								</div>
							</div>
						<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>

<style type="text/css">
	.control-label {
		text-align: left;
	}
</style>

@endsection

