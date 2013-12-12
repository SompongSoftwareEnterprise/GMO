@extends('layout')
@section('title') 
    Create Certificate Request Form 
@endsection 
@section('content')

<div class="panel-body ">

    {{ View::make('errors_row') }}

    <div class="row">
        {{ Form::open(array( 'action' => array('EntrepreneurDomesticRequestsController@create'), 'class' => 'form-horizontal', 'id' => 'dmt-new-request-form', )) }}
        <div id="form_1" class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <h3 class="col-sm-offset-1">สทช 1-2/1</h3>
                    <div class="row" style="margin-top: 30px;">
                        <label class="col-xs-3 text-right">
                            Name
                        </label>
                        <div class="col-xs-8 text-left">
                            {{ $entrepreneur->first_name }} {{ $entrepreneur->last_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Address
                        </label>
                        <div class="col-xs-8 text-left">
                            {{ $entrepreneur->address1 }}
                            <br>{{ $entrepreneur->address2 }}
                            <br>{{ $entrepreneur->city }}, {{ $entrepreneur->province }}, {{ $entrepreneur->country }}, {{ $entrepreneur->zip }}
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Phone
                        </label>
                        <div class="col-xs-8 text-left">
                            {{ $entrepreneur->phone }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Mobile Phone
                        </label>
                        <div class="col-xs-8 text-left">
                            {{ $entrepreneur->mobile }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Fax
                        </label>
                        <div class="col-xs-8 text-left">
                            {{ $entrepreneur->fax }}
                        </div>
                    </div>
                    <hr>

                    <!-- form -->
                    <!--<form class="form-horizontal" role="form">-->
                
                    <!-- Company THAI -->
                    <!-- <div class="form-group" id="represent">
                        {{ Form::label('rep_of', 'Representative of', array('class' => 'col-xs-3 control-label text-right')) }}
                        <div class="col-xs-8">
                             {{ Form::select('rep_of', array('' => 'Representative of', 'C0023' => 'C0023 - Sompong'), null, array('class' => 'form-control')) }}
                          
                        </div>
                    </div> -->

                    <?php if ($entrepreneur->is_agency == 1) { ?>
                        <!-- owner id -->
                        <div class="form-group" style="text-align: right;">
                            {{ Form::label('owner_id', 'Owner ID', array('class' => 'col-xs-3', 'control-label')) }}
                            <div class="col-xs-8">
                                <select class="form-control" name="owner_id">
                                    <option>Owner</option>
                                    <?php for($i = 0; $i < sizeof($customerAgency); $i++) { ?>
                                        <option value="{{ $customerAgency[$i]->customer_id }}">Owner ID {{ $customerAgency[$i]->customer_id }} - {{ $customerAgency[$i]->first_name }} {{ $customerAgency[$i]->last_name }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    
                    
                    <div class="form-group">
                        <!--<label for="manufactoryName" class="col-xs-3 control-label ">
								Manufactory
							</label>-->
                        {{ Form::label('company_th', 'บริษัท', array('class' => 'col-xs-3 control-label text-right')) }}
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
                            {{ Form::select('province_th', array('' => 'จังหวัด', 'กรุงเทพมหานคร' => 'กรุงเทพมหานคร'), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="manufactory_province">
									<option>State/Province</option>
									<option>Bangkok</option>
									<option>Pathumthani</option>
								</select>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4">
                            {{ Form::select('country_th', array( '' => 'ประเทศ', 'ไทย' => 'ไทย' ), null, array('class' => 'form-control')) }}
                            <!--<select class="form-control" name="manufactory_country">
									<option>Country</option>
									<option>Thailand</option>
									<option>Laos</option>
								</select>-->
                        </div>
                    </div>


                    <!-- COMPANY ENG -->
                    <div class="form-group">
                        <!--<label for="plantWarehouseName" class="col-xs-3 control-label ">
								Plant Warehouse
							</label>-->
                        {{ Form::label('company_en', 'Company', array('class' => 'col-xs-3 control-label text-right')) }}
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
                    </div>

                     <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-4 ">
                            {{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code (ex. 12345)')) }}
                            <!--<input type="text" class="form-control" name="warehouse_zip" placeholder="Zip Code (ex. 12345)">-->
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="form-group">
                        <!--<label for="contact" class="col-xs-3 control-label">
								Contact
							</label>-->
                        {{ Form::label('contact_name', 'Contact', array('class' => 'col-xs-3 control-label text-right')) }}
                        <div class="col-xs-8 ">
                            {{ Form::text('contact_name', null, array('class' => 'form-control', 'placeholder' => 'Name (ex. Sompong Thepsoftware)')) }}
                            <!--<input type="text" class="form-control" id="contact" name="contact_name" placeholder="Name (ex. Sompong Thepsoftware)">-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{ Form::text('contact_number', null, array('class' => 'form-control', 'placeholder' => 'Phone (ex. 02-349-2893)')) }}
                            <!--<input type="text" class="form-control" name="contact_phone" placeholder="Phone (ex. 0-2345-6789)">-->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="purpose" class="col-xs-3 control-label">
                                Purpose
                        </label>
                        <div class="col-xs-8">
                            {{ Form::text('purpose', null, array('class' => 'form-control', 'placeholder' => 'Purpose for certificate request')) }}
                        </div>
                    </div>

                    <br><br>
                    <!-- Examples -->
                    <div class="col-sm-offset-1">
                        <h3>สทช 1-2/2</h3>
                    </div>
                    <hr>
                    <div class="example-detail">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">
                                Plant
                                <span data-gmo-example="number">1</span>
                            </label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control" name="plant_name_th_ex1" placeholder="ชื่อพืช (ไทย)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8">
                                <input type="text" class="form-control" name="plant_name_eng_ex1" placeholder="Plant name (Eng)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8">
                                <input type="text" class="form-control" name="plant_name_sci_ex1" placeholder="Scientific Plant name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-4 ">
                                <input type="number" class="form-control" placeholder="Certificate Amount" name="cert_amount_ex1">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <div class="col-sm-offset-3 col-xs-4">
                                <select name="export_to_ex1" class="form-control">
                                    <option>Export Country</option>
                                    <option>Thailand</option>
                                    <option>Sweden</option>
                                </select>
                            </div> -->
                            <div class="col-sm-offset-3 col-xs-4 ">
                                <input type="text" class="form-control" name="export_to_ex1" placeholder="Export To (ex. USA,EUROPE,ASIA)">
                            </div>

                            <div class="col-xs-4 ">
                                <input type="number" class="form-control" name="export_qty_ex1" placeholder="Export Quantity">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-xs-8 ">
                                <input type="text" class="form-control" name="export_val_ex1" placeholder="Export Value (Baht)">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="col-sm-offset-7 col-xs-5">
                                <button data-gmo-example="remove" type="button" class="btn btn-danger">Remove</button>
                                <button data-gmo-example="add" type="button" class="btn btn-primary">Add Plant</button>
                            </div>
                        </div> -->

                    </div>
                <script>

                    // $(document).ready(function() {
                    //    if (<?php echo $entrepreneur->is_agency; ?> != 1) {
                    //         $('#represent').hide();
                    //    } 

                    // });
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

@endsection

