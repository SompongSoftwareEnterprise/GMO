@extends('layout')
@section('title') 
    View Domestic Certificate Request Form
@endsection 
@section('content')

<div class="panel-body ">
    <div class="row">
        <div id="certificateRequestForm1" class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <div class="row">
                        <div class="col-sm-offset-1">
                            <h2>สทช 1-2/1</h2>
                        </div>
                    </div>
        
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

                    
                    
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            บริษัท
                        </label>
                        <div class="col-xs-8">
                            {{$dmt_cert['company_th']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['address_th']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['address_th2']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            เขต {{$dmt_cert['city_th']}}  
                             จังหวัด {{$dmt_cert['province_th']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            รหัสไปรษณีย์ {{$dmt_cert['zip']}}
                        </div>
                    </div>
                    <br>
              <!-- COMPANY ENG -->      
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Company
                        </label>
                        <div class="col-xs-8">
                            {{$dmt_cert['company_en']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['address_en']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['address_en2']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['city_en']}}  
                            , {{$dmt_cert['province_en']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['zip']}}
                        </div>
                    </div>
                    <br>
<!--contact-->
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Contact
                        </label>
                        <div class="col-xs-8">
                            {{$dmt_cert['contact_name']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-8">
                            {{$dmt_cert['contact_number']}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-xs-3 text-right">
                            Purpose
                        </label>
                        <div class="col-xs-8">
                            {{$dmt_cert['purpose']}}
                        </div>
                    </div>
                    
                    
                    <br><br>
                    <!-- Examples -->
                    <div class="row">
                        <div class="col-sm-offset-1">
                            <h2>สทช 1-2/1</h2>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top: 10px;">
                        <table class="table table-bordered table-hover " >
                            <thead>
                                <tr>
                                    <th>Plant name (TH)</th>
                                    <th>Common name (EN)</th>
                                    <th>Scientific name</th>
                                    <th class="col-xs-1">Certificate Amount</th>
                                    <th>Export to</th>
                                    <th class="col-xs-1">Quantity (ton)</th>
                                    <th class="col-xs-1">Value (Baht)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($example); $i++)
                                <tr>
                                    <td>{{($i)+1}}. {{$example[$i]['plant_name_th']}}</td>
                                    <td>{{$example[$i]['plant_name_eng']}}</td>
                                    <td>{{$example[$i]['plant_name_sci']}}</td>
                                    <td>{{$example[$i]['cert_amount']}}</td>
                                    <td>{{$example[$i]['export_to']}}</td>
                                    <td>{{$example[$i]['export_qty']}}</td>
                                    <td>{{$example[$i]['export_val']}}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                         
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

@endsection

