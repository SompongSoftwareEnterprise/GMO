@extends('layout')

@section('title')
	Account Information
@endsection

@section('content')
	       <ol class="breadcrumb" style="float:right ; margin-top:-35px">
          <li><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li class="active">Data</li>
        </ol>






<br><br>
        <div class="row">
          <div class="col-sm-12">
            <div class="bs-example bs-example-tabs">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#accountInformation" data-toggle="tab">Account information</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">

                <!-- Account information tab -->
                <div class="tab-pane fade active in" id="accountInformation">
                  <h3>Account Information</h3>
                </br>

                {{ Form::open(array('route' => 'entrepreneur.edit')) }}
                @foreach ($accounts as $account)

                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Account Type:</label>
                          @if ($account->is_agency==0)
                            <div class="col-xs-9 control-label">Customer</div>
                          @else
                            <div class="col-xs-9 control-label">Agency</div>
                          @endif    
                    </div> 

                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> User ID:</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->id}}" name="id">
                            <input type="hidden" value="{{$account->user_id}}" name="user_id">
                            {{$account->user_id}}
                            </div>
                    </div> 

                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Firstname:</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->first_name}}" name="first_name">
                          {{$account->first_name}}</div>
                    </div> 
                      <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Lastname:</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->last_name}}" name="last_name">
                          {{$account->last_name}}</div>
                    </div> 
                    
                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Address:</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->address1}}" name="address1">
                          {{$account->address1}}</div>
                    </div> 
                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"></label>
                         <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->address2}}" name="address2">
                         {{$account->address2}}</div>
                    </div> 

                    <div class ="row form-group">
                        <label for="sampleLabel" class="col-xs-3 control-label text-right"> Country:</label>
                        <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->country}}" name="country">
                            <input type="hidden" value="{{$account->city}}" name="city">
                        {{$account->country}}</div>
                    </div> 

                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Email:</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->email}}" name="email">
                          {{$account->email}}</div>
                    </div> 
                       
                    <div class ="row form-group">
                         <label for="sampleLabel" class="col-xs-3 control-label text-right"> Phone no.</label>
                          <div class="col-xs-9 control-label">
                            <input type="hidden" value="{{$account->phone}}" name="phone">
                          {{$account->phone}}</div>
                    </div> 
                @endforeach
                  
                  
                <div class="col-sm-offset-9">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

                {{Form::close()}}

                </div>
              </div>
            </div>
          </div>
        </div>
@endsection