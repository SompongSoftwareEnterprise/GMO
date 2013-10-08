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
						{{$entrepreneur->first_name}}</div>
					</div> 
					<div class ="row form-group">
						<label for="sampleLabel" class="col-xs-3 control-label text-right"> Lastname:</label>
						<div class="col-xs-9 control-label">
							{{$entrepreneur->last_name}}</div>
						</div> 

						<div class ="row form-group">
							<label for="sampleLabel" class="col-xs-3 control-label text-right"> Address:</label>
							<div class="col-xs-9 control-label">
								{{$entrepreneur->address1}}</div>
							</div> 
							<div class ="row form-group">
								<label for="sampleLabel" class="col-xs-3 control-label text-right"></label>
								<div class="col-xs-9 control-label">
									{{$entrepreneur->address2}}</div>
								</div> 

								<div class ="row form-group">
									<label for="sampleLabel" class="col-xs-3 control-label text-right"> Country:</label>
									<div class="col-xs-9 control-label">
										{{$entrepreneur->country}}</div>
									</div> 

									<div class ="row form-group">
										<label for="sampleLabel" class="col-xs-3 control-label text-right"> Email:</label>
										<div class="col-xs-9 control-label">
											{{$entrepreneur->email}}</div>
										</div> 

										<div class ="row form-group">
											<label for="sampleLabel" class="col-xs-3 control-label text-right"> Phone no.</label>
											<div class="col-xs-9 control-label">
												{{$entrepreneur->phone}}</div>
											</div>


											<div class="col-sm-offset-9">
												<a href="{{action('EntrepreneurController@editAccount')}}" class="btn btn-primary">Edit</a>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						@endsection