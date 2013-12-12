@extends('layout')

@section('title')
Account Information
@endsection

@section('content')

<div class ="container">

      <h3 class = "col-xs-8 col-sm-offset-1"> Agency information</h3>
      <div class = "col-xs-8">
        <div class = "container">

          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Firstname</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->first_name}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Lastname</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->last_name}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Company</strong>
            </div>
            <div class = "col-xs-8" >
              SompongCompany
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Email</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->email}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address1</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->address1}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address2</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->address2}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Zip code</strong>
            </div>
            <div class = "col-xs-8" >
              SompongZip code
              {{$agency->zip}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>City</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->city}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Country</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->country}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Phone</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->phone}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Fax</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->fax}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Mobile phone</strong>
            </div>
            <div class = "col-xs-8" >
              {{$agency->mobile}}
            </div>
          </div>
        </div>

      </div>

      <div class = "row" >
       <!-- <form class = "form-inline text-right " role = "form" action = "EntrepreneurAgenciesController@delete" method = "post">-->
        {{ Form::open(array('action' => 'EntrepreneurAgenciesController@delete', 'class' => 'form-inline text-right' )) }}
          <div class = "form-group col-xs-6 col-sm-offset-5">

            <a href="{{action('EntrepreneurAccountController@index')}}" class="btn btn-primary">Back</a>
            <input type = "submit" class = "btn btn-danger" value = "Revoke Agency">
            
            <input type="hidden" value="{{$agency->user_id}}" name="agency_id">
            <input type="hidden" value="{{$entrepreneurID}}" name="customer_id">
          </div>
        </form>
      </div>
  </div> 

  @endsection
