@extends('layout')

@section('title')
Account Information
@endsection

@section('content')

    <div class = "container">
<!--      <form class = "inline-form text-center"> -->
        {{ Form::open(array('action' => 'EntrepreneurAgenciesController@createAgenciesBySearch', 'class' => 'form-inline text-right', 'value' => $agencyID) ) }}
              <input type ='hidden' name = 'customer_id' value = {{$entrepreneurID}} >
        <div class = "row form-group col-xs-9 col-sm-offset-3">
          <div class = "col-xs-2">
            <h5> <strong>Agency ID : </strong></h5>
          </div>
          @if($agencyID == null)
          <div class = "col-xs-3">
            <input type = "text" name = "agency_id" class = "form-control" placeholder = "ex. 0000000001">
          </div>
          @else
          <div class = "col-xs-3">
            <input type = "text" name = "agency_id" value = {{$agencyID}} class = "form-control" placeholder = "ex. 0000000001">
          </div>
          @endif

          <div class = "col-xs-1">
            <button id = "searchButton" type = "submit" class ="btn btn-primary"> Search </button>
          </div>
        </div>
      </form>


      <br>
      <br>
      <hr>
	  @if($agency == null && $agencyID != null)
		<h3>Agency ID not found</h3>
      @elseif($agency != null)

      <div id = "info"  class = "container">

        <h3 class = "col-xs-8 col-sm-offset-1"> Agency information</h3>
        <div class = "container  col-xs-8 col-sm-offset-2">

          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Firstname</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->first_name}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Lastname</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->last_name}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Company</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
                ??
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Email</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->email}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address1</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->address1}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address2</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->address2}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Zip code</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->zip}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>City</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->city}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Country</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->country}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Phone</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->phone}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Fax</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->fax}}
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Mobile phone</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              {{$agency->mobile}}
            </div>
          </div>

        {{ Form::open(array('action' => 'EntrepreneurAgenciesController@create', 'class' => 'col-xs-9 text-right') ) }}
        <!--  <form class = "col-xs-9 text-right"> -->
            <div class = "row form-group">
              <input type ='hidden' name = 'customer_id' value = {{$entrepreneurID}} >
              <input type ='hidden' name = 'agency_id' value = {{$agency->user_id}} >
              <input id = "add-agency-confirm-button" type = "submit" class = "btn btn-primary" value = "Add Agency">
            </div>
          </form>
        </div>

      </div>
    @endif
  </div>
  @endsection
