@extends('layout')

@section('title')
Account Information
@endsection

@section('content')

    <div class = "container">
      <form class = "inline-form text-center">
        <div class = "row form-group col-xs-9 col-sm-offset-3">
          <div class = "col-xs-2">
            <h5> <strong>Agency ID : </strong></h5>
          </div>
          <div class = "col-xs-3">
            <input type = "text" class = "form-control" placeholder = "ex. 0000000001">
          </div>
          <div class = "col-xs-1">
            <button id = "searchButton" class ="btn btn-primary" onclick="showInfo()" > Search </button>
          </div>
        </div>
      </form>


      <br>
      <br>
      <hr>

      <div id = "info"  class = "container">

        <h3 class = "col-xs-8 col-sm-offset-1"> Agency information</h3>
        <div class = "container  col-xs-8 col-sm-offset-2">

          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Firstname</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongFirstname
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Lastname</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongLastname
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Company</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongCompany
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Email</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongEmail
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address1</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongAddress1
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Address2</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongAddress2
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Zip code</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongZip code
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>City</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongCity
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Country</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongCountry
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Phone</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongPhone
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Fax</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongFax
            </div>
          </div>
          <div class = "row">
            <div class = "col-xs-3 text-right" >
              <strong>Mobile phone</strong>
            </div>
            <div class = "col-xs-8 col-sm-offset-1" >
              SompongMobile phone
            </div>
          </div>

          <form class = "col-xs-9 text-right">
            <div class = "row form-group">
              <button id = "agencyId" type = "button" class = "btn btn-primary" onclick = "addConfirmation()">Add Agency</button>
            </div>
          </form>
        </div>
      </div>

  </div>
  @endsection
