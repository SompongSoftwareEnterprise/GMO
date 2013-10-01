@extends('layout')

@section('title')
	Account Setting
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
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Account Type:</label>
                      <div class="col-xs-9 control-label">Customer</div>
                  </div> 
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> User ID:</label>
                      <div class="col-xs-9 control-label">Sompong1234</div>
                  </div> 
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Password:</label>
                      <div class="col-xs-9 control-label">************</div>
                  </div> 
                </br>
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Firstname:</label>
                      <div class="col-xs-9 control-label">Sompong</div>
                  </div> 
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Lastname:</label>
                      <div class="col-xs-9 control-label">Bigmuscle</div>
                  </div> 
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Address:</label>
                      <div class="col-xs-9 control-label">123/45 ngamwongwan55 Sompong Dorm Kasetsart University , bangkok</div>
                  </div> 
                  <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Country:</label>
                      <div class="col-xs-9 control-label">Thailand</div>
                  </div> 
                   <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Zip code:</label>
                      <div class="col-xs-9 control-label">11000</div>
                  </div> 
                   <div class ="row">
                     <label for="sampleLabel" class="col-xs-3 control-label text-right"> Phone no.</label>
                      <div class="col-xs-9 control-label">080-888-3333</div>
                  </div> 
                  
                  <div class="text-right">
                  <button type="button" class="btn btn-primary">Edit</button>
                  </div>
                </div>


                

               

                <div class="text-right">
                  <button type="button" class="btn btn-primary">Add</button>
                                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection