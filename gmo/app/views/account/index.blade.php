@extends('layout')

@section('title')
Account Information
@endsection

@section('content')


<br><br>
<div class="row">
  <div class="col-sm-12">
    <div class="bs-example bs-example-tabs">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#accountInformation" data-toggle="tab">Account information</a></li>
        <li><a href="#agency" data-toggle="tab">Agency</a></li>
      </ul>
    </div>
    <div id="myTabContent" class="tab-content">

      <!-- Account information tab -->
      <div class="tab-pane fade active in" id="accountInformation">
        <h3>Account Information</h3>


        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Account Type:</label>
          @if ($entrepreneur->is_agency==0)
          <div class="col-xs-9 control-label">Customer</div>
          @else
          <div class="col-xs-9 control-label">Agency</div>
          @endif    
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> User ID:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->user_id}}
          </div>
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Firstname:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->first_name}}
          </div>
        </div> 
        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Lastname:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->last_name}}
          </div>
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Address:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->address1}}
          </div>
        </div> 
        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"></label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->address2}}
          </div>
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Country:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->country}}
          </div>
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Email:</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->email}}
          </div>
        </div> 

        <div class ="row form-group">
          <label for="sampleLabel" class="col-xs-3 control-label text-right"> Phone no.</label>
          <div class="col-xs-9 control-label">
            {{$entrepreneur->phone}}
          </div>
        </div>


        <div class="col-sm-offset-9">
          <a href="{{action('EntrepreneurAccountController@editAccount')}}" class="btn btn-primary">Edit</a>
        </div>
      </div>



      <!-- Agency tab -->
      <div class="tab-pane fade" id="agency">
        <h3>Registered Agency</h3>
        </br>
        <div class="row">
          <div class="col-sm-offset-1 col-xs-10">
            <table class="table table-bordered">
              <thead>
                <tr class="Header">
                  <th>ID</th>
                  <th >Agency name</th>
                </tr>
              </thead>
              <tbody>

                @foreach($agencies as $agency)
                  <tr class="info">
                    <td><a href="{{action('EntrepreneurAgenciesController@deleteAgencies', array('entrepreneurID' => $entrepreneur->user_id , 'agencyID' => $agency->user_id))}}"> {{$agency->user_id}}</a></td>
                    <td >{{$agency->first_name}} {{$agency->last_name}}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="text-right">
          <a href="{{action('EntrepreneurAgenciesController@createAgencies', array('entrepreneurID' => $entrepreneur->user_id))}}" class="btn btn-primary">Add</a>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
