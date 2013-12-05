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
								        <h2>สทช 1-1/2</h2>
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
										Common Name
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert_info['common_name']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Vendor or Consignee
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert_info['vendor_or_consignee']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert_info['address1']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert_info['address2']}}
									</div>
				        		</div>
                                <div class="row">
									<div class="col-sm-offset-3 col-xs-8  control-label">
										{{$ex_cert_info['city']}}, {{$ex_cert_info['province']}}, {{$ex_cert_info['country']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Description of Product
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert_info['description_of_product']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Final Destination
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert_info['final_destination']}}
									</div>
				        		</div>
                                <div class="row">
									<label class="col-xs-3 control-label text-right">
										Port of Entry or Embarktion
									</label>
									<div class="col-xs-8  control-label">
										{{$ex_cert_info['port_of_entry']}}
									</div>
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
		</div>
	</div>

@endsection
