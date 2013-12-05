@extends('layout')
@section('title') 
    View Export Certificate Request Form
@endsection 
@section('content')


      		<div class="panel-body ">

				<div class="row">

					<div id="certificateRequestForm1" class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body text-left">
								<div class="row">
								    <div class="col-sm-offset-1">
								        <h2>สทช 1-1/1</h2>
								    </div>
								    
								</div>
								<div class="row" style="margin-top: 30px;">
									<label class="col-xs-3 control-label text-right">
										Name
									</label>
									<div class="col-xs-8  control-label">
										 {{ $entrepreneur->first_name }} {{ $entrepreneur->last_name }}
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
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Manufactory
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['manufactory_name']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_address1']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_address2']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_city']}} ,                                                 {{$ex_cert['manufactory_province']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_country']}} ,
										{{$ex_cert['manufactory_zip']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_phone']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['manufactory_fax']}}
									</div>
				        		</div>
                                
                                <br>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Warehouse
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['warehouse_name']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_address1']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_address2']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_city']}} ,
								        {{$ex_cert['warehouse_province']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_country']}}, 
										{{$ex_cert['warehouse_zip']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_phone']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['warehouse_fax']}}
									</div>
				        		</div>
                                <br>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Purpose
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['purposes']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Contact
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['contact_name']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['contact_phone']}}, {{$ex_cert['contact_email']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Receiver
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['receiver_name']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['receiver_address1']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['receiver_address2']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert['receiver_city']}} ,
										{{$ex_cert['receiver_province']}} ,        
								    {{$ex_cert['receiver_country']}}
									</div>
				        		</div>
                                <div class="row">
				        		    <label class="col-xs-3 control-label text-right">
										Origin of plant
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert['origin_of_plant']}}
									</div>
				        		
				        		</div>
                        <div class="row">
                                <div class="col-sm-offset-1" style="margin-top: 50px;">
								        <h3>Example</h3><br>
								</div>
                        </div>     
                        <div class="col-xs-12">
                            <table class="table table-bordered table-hover " >
                                <thead>
                                    <tr>
                                        <th>Example Type</th>
                                        <th>Detail</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < sizeof($example); $i++)
                                    <tr>
                                        <td>{{($i)+1}}. {{$example[$i]['type_of_example']}}</td>
                                        <td>{{$example[$i]['detail']}}</td>
                                        <td>{{$example[$i]['quantity']}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                                
				        		<br>
				        		<div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-4 text-center">
                    
                                        <a href="{{ action('StaffRequestsController@show', $ref_id) }}" class="btn btn-primary">Back to request</a>
                                    </div>
                                </div>
				        		
							</div>
						</div>
					</div>
				</div>

			</div>
			
@endsection
