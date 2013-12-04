@extends('layout')

@section('title')
Create Certificate Request Form
@endsection

@section('content')

<div class="panel-body ">

	{{ View::make('errors_row') }}

	<div class="row">

		<!-- <div class="col-xs-2"> -->
		<!-- 	<div class="btn-group-vertical"> -->
		<!-- 		<button type="button" class="btn btn-active" data-toggle="#"> -->
		<!-- 			<a href="#form_1"> -->
		<!-- 				<span class="glyphicon glyphicon-file"></span>สทช 1-1/1 -->
		<!-- 			</a> -->
		<!-- 		</button> -->
		<!-- 		<button type="button" class="btn btn-default" data-toggle="form_1"> -->
		<!-- 			<a href="#form_2"> -->
		<!-- 				<span class="glyphicon glyphicon-file"></span>สทช 1-1/2 -->
		<!-- 			</a> -->
		<!-- 		</button> -->
		<!-- 	</div> -->
		<!-- </div> -->

		{{ Form::open(array(
			'action' => array('EntrepreneurRequestsController@createCertificateInfo', 
$id),
			'class' => 'form-horizontal',
			'id' => 'new-request-form',
			))
		}}
		<div id="form_2" class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body text-left">
					<h2>&nbsp;&nbsp;สทช 1-1/2</h2>

					<div class="row" style="margin-top: 30px;">
						<label class="col-xs-3 text-right">
							Manufacture or Shipper 
						</label>
						<div class="col-xs-8">
							{{ $entrepreneur->first_name }}
							{{ $entrepreneur->last_name }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 text-right">
							Address 
						</label>
						<div class="col-xs-8">
							{{ $entrepreneur->address1 }}<br>
							{{ $entrepreneur->address2 }}<br>
							{{ $entrepreneur->city }}, {{ $entrepreneur->province }}, {{ $entrepreneur->country }}, {{ $entrepreneur->zip }}<br>
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 text-right">
							Phone 
						</label>
						<div class="col-xs-8">
							{{ $entrepreneur->phone }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 text-right">
							Mobile Phone 
						</label>
						<div class="col-xs-8">
							{{ $entrepreneur->mobile }}
						</div>
					</div>
					<div class="row"> 
						<label class="col-xs-3 text-right">
							Fax 
						</label>
						<div class="col-xs-8">
							{{ $entrepreneur->fax }}
						</div>
					</div>

					<hr>
					<form class="form-horizontal" role="form">
						<div class="form-group" style="text-align: right;">
							<!--<label for="commonName" class="col-xs-3 control-label ">
								Common Name
							</label>-->
							{{ Form::label('common_name', 'Common Name', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								<!--<input type="text" class="form-control" id="commonName" name="common_name" placeholder="Plant Name (ex. Onion)">-->
								{{ Form::text('common_name', null, array('class' => 'form-control', 'placeholder' => 'Plant Name (ex. Onion)')) }}
							</div>
						</div>
						<div class="form-group" style="text-align: right;">
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

						<div class="form-group" style="text-align: right;">
							<!-- <label for="descriptionOfProduct" class="col-xs-3 control-label "> -->
							<!-- 	Description of Product -->
							<!-- </label> -->
							{{ Form::label('description_of_product', 'Description of Product', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::text('description_of_product', null, array('class' => 'form-control', 'placeholder' => 'Detail')) }}
								<!-- <textarea type="text" class="form-control" id="descriptionOfProduct" name="description_of_product" placeholder="Detail" style="height: 95px;"></textarea> -->
							</div>
						</div>

						<div class="form-group" style="text-align: right;">
							<!-- <label for="finalDestination" class="col-xs-3 control-label "> -->
							<!-- 	Final Destination -->
							<!-- </label> -->
							{{ Form::label('final_destination', 'Final Destination', array('class' => 'col-xs-3', 'control-label')) }}
							<div class="col-xs-8">
								{{ Form::select('final_destination', array(
									'' => 'Country',
									'Thailand' => 'Thailand',
									'China' => 'China',
									), null, 
									array('class' => 'form-control')) 
								}}
								
								<!-- <select class="form-control" id="finalDestination" name="final_destination"> -->
								<!-- 	<option>State/Province</option> -->
								<!-- 	<option>Bangkok</option>	 -->
								<!-- </select> -->
							</div>
						</div>

						<div class="form-group" style="text-align: right;">
							<!-- <label for="portOfEntryOrEmbarktion" class="col-xs-3 control-label "> -->
								<!-- Port of Entry or Embarktion</label> -->
							{{ Form::label('port_of_entry', 'Port of Entry or Embarktion', array('class' => 'col-xs-3', 'control-label')) }}

								<div class="col-xs-8">
									{{ Form::text('port_of_entry', null, array('class' => 'form-control', 'placeholder' => 'ex. Port of China')) }}
									<!-- <select class="form-control" id="portOfEntryOrEmbarktion" name="port_of_entry"> -->
									<!-- 	<option>Country</option> -->
									<!-- 	<option>Thailand</option> -->
									<!-- </select> -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-8 col-sm-4">
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
	</div>
</div>

@endsection
