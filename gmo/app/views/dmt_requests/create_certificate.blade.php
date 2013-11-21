@extends('layout') @section('title') Create Certificate Request Form @endsection @section('content')

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
        {{ Form::open(array( 'action' => array('EntrepreneurRequestsController@create'), 'class' => 'form-horizontal', 'id' => 'new-request-form', )) }}
        <div id="form_1" class="col-xs-10">
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <h2>&nbsp;&nbsp;สทช 1-2/1</h2>
                    <div class="row" style="margin-top: 30px;">
                        <label class="col-xs-3 control-label text-right">
                            Name
                        </label>
                        <div class="col-xs-8 control-label text-left">
                            {{ $entrepreneur->first_name }} {{ $entrepreneur->last_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 control-label text-right">
                            Address
                        </label>
                        <div class="col-xs-8  control-label  text-left">
                            {{ $entrepreneur->address1 }}
                            <br>{{ $entrepreneur->address2 }}
                            <br>{{ $entrepreneur->city }}, {{ $entrepreneur->province }}, {{ $entrepreneur->country }}, {{ $entrepreneur->zip }}
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 control-label text-right">
                            Phone
                        </label>
                        <div class="col-xs-8  control-label  text-left">
                            {{ $entrepreneur->phone }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 control-label text-right">
                            Mobile Phone
                        </label>
                        <div class="col-xs-8  control-label  text-left">
                            {{ $entrepreneur->mobile }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 control-label text-right">
                            Fax
                        </label>
                        <div class="col-xs-8  control-label  text-left">
                            {{ $entrepreneur->fax }}
                        </div>
                    </div>
                    <hr>

                    <!-- form -->
                    <!--<form class="form-horizontal" role="form">-->
                
                    <!-- Company THAI -->
                    <div class="form-group">
                        {{ Form::label('manufactory_name', 'Manufactory', array('class' => 'col-xs-3', 'control-label')) }}
                        <div class="col-xs-8">
                             {{ Form::select('rep_of', array('' => 'Representative of', 'C0023' => 'C0023 - Sompong'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <!--<label for="manufactoryName" class="col-xs-3 control-label ">
								Manufactory
							</label>-->
                        {{ Form::label('manufactory_name', 'Manufactory', array('class' => 'col-xs-3', 'control-label')) }}
                        <div class="col-xs-8">
                            {{ Form::text('company_th', null, array('class' => 'form-control', 'placeholder' => 'บริษัท')) }}
                            <!--<input type="text" class="form-control" id="manufactoryName" name="manufactory_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8 ">
                            {{ Form::text('address_th', null, array('class' => 'form-control', 'placeholder' => 'ที่อยู่ 1')) }}
                            <!--<input type="text" class="form-control" name="manufactory_address1" placeholder="Address Line 1">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8 ">
                            {{ Form::text('address_th2', null, array('class' => 'form-control', 'placeholder' => 'ที่อยู่ 2')) }}
                            <!--<input type="text" class="form-control" name="manufactory_address2"  placeholder="Address Line 2">-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4">
                            {{ Form::text('city_th', null, array('class' => 'form-control', 'placeholder' => 'เขต')) }}
                            <!--<input type="text" class="form-control" name="manufactory_city" placeholder="Town/City">-->
                        </div>
                        <div class="col-xs-4 ">
                            {{ Form::select('province_th', array('' => 'State/Province', 'Bangkok' => 'กรุงเทพมหานคร'), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="manufactory_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4">
                            {{ Form::select('country_th', array( '' => 'Country', 'Thailand' => 'ไทย' ), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="manufactory_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
                        </div>
                        <div class="col-xs-4 ">
                            {{ Form::text('zip_th', null, array('class' => 'form-control', 'placeholder' => 'รหัสไปรษณีย์')) }}
                            <!--<input type="text" class="form-control" name="manufactory_zip" placeholder="Zip Code (ex. 12345)">-->
                        </div>
                    </div>


                    <!-- COMPANY ENG -->
                    <div class="form-group">
                        <!--<label for="plantWarehouseName" class="col-xs-3 control-label ">
								Plant Warehouse
							</label>-->
                        {{ Form::label('company_en', 'Company', array('class' => 'col-xs-3', 'control-label')) }}
                        <div class="col-xs-8 ">
                            {{ Form::text('company_en', null, array('class' => 'form-control', 'placeholder' => 'Company name')) }}
                            <!--<input type="text" class="form-control" id="plantWarehouseName" name="warehouse_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8 ">
                            {{ Form::text('address_en', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
                            <!--<input type="text" class="form-control" name="warehouse_address1"  placeholder="Address Line 1">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8 ">
                            {{ Form::text('address_en2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
                            <!--<input type="text" class="form-control" name="warehouse_address2" placeholder="Address Line 2">-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4">
                            {{ Form::text('city_en', null, array('class' => 'form-control', 'placeholder' => 'Town/City')) }}
                            <!--<input type="text" class="form-control" name="warehouse_city" placeholder="Town/City">-->
                        </div>
                        <div class="col-xs-4 ">
                            {{ Form::select('province_en', array( '' => 'State/Province', 'Bangkok' => 'Bangkok' ), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="warehouse_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4">
                            {{ Form::select('country_en', array( '' => 'Country', 'Thailand' => 'Thailand' ), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="warehouse_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
                        </div>
                        <div class="col-xs-4 ">
                            {{ Form::text('zip_en', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
                            <!--<input type="text" class="form-control" name="warehouse_zip" placeholder="Zip Code (ex. 12345)">-->
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
                        <div class="col-sm-offset-3 col-xs-8">
                            {{ Form::text('contact_phone', null, array('class' => 'form-control', 'placeholder' => 'Phone (ex. 02-349-2893)')) }}
                            <!--<input type="text" class="form-control" name="contact_phone" placeholder="Phone (ex. 0-2345-6789)">-->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{ Form::text('purpose', null, array('class' => 'form-control', 'placeholder' => 'Purpose for certificate request')) }}
                        </div>
                    </div>


                    <!-- Examples -->
                    <div class="col-sm-offset-1">
                        <h3>สทช 1-2/2</h3>
                    </div>
                    <hr>
                    <div class="example-detail">
                        <div class="form-group">
                            <label for="exampleType_ex1" class="col-xs-3 control-label">
                                Plant #
                                <span data-gmo-example="number">1</span>
                            </label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control" id="plant-name-th-1" name="plant_name_th_1" placeholder="ชื่อพืช (ไทย)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8">
                                <input type="text" class="form-control" id="plant-name-eng-1" name="plant_name_eng_1" placeholder="Plant name (Eng)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8">
                                <input type="text" class="form-control" id="plant-name-sci-1" name="plant_name_sci_1" placeholder="Scientific Plant name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offest-3 col-xs-4 ">
                                <input type="number" class="form-control" placeholder="Certificate Amount" name="cert_amount_1" id="cert-amount-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-4">
                                <select class="form-control">
                                    <option>Export Country</option>
                                    <option>Thailand</option>
                                    <option>Sweden</option>
                                </select>
                            </div>
                            <div class="col-xs-4 ">
                                <input type="number" class="form-control" name="export_qty_1" id="export-qty-1" placeholder="Export Quantity">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8 ">
                                <input type="text" class="form-control" id="export-val-1" name="export_val_1" placeholder="Export Value (Baht)">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-7 col-xs-5">
                            <button data-gmo-example="remove" type="button" class="btn btn-danger">Remove</button>
                            <button data-gmo-example="add" type="button" class="btn btn-primary">Add Plant</button>
                        </div>
                    </div>
                </div>
                <script>
                    $(function() {
                        var template = $('.example-detail').html()
                        $(document).on('click', '[data-gmo-example="remove"]', function(e) {
                            if ($('.example-detail').length == 1) {
                                alert('Cannot remove last plant')
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
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-7 col-sm-5">
                    <a href="{{ action('EntrepreneurRequestsController@index') }}" class="btn btn-default">Back</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
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

