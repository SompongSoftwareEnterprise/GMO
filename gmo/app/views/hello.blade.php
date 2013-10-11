@extends('layout')

@section('title')
	GMO e-Government System
@endsection

@section('content')
<div class="row">
	
	<div class="col-sm-offset-1 col-xs-5">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p><strong><h3 class="text-primary">"Register"</h3></strong></p>
				<p>
					<a href="{{ action('RegistrationController@index') }}" class="btn btn-primary btn-lg">Click Here</a>
				</p>
			</div>
		</div>
		
	</div>
	
	<div class="col-xs-5">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p><strong><h3 class="text-success">"Enterprenuer"</strong></p>
				<p>
					<a href="{{ action('EntrepreneurRequestsController@index') }}" class="btn btn-success btn-lg">Click Here</a>
				</p>
			</div>
		</div>

	</div>
	
</div>
<div class="row">
	
	<div class="col-sm-offset-1 col-xs-5">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p><strong><h3 class="text-warning">"GMO Staff"</h2></strong></p>
				<p>
					<a href="{{ action('StaffRequestsController@index') }}" class="btn btn-warning btn-lg">Click Here</a>
				</p>
			</div>
		</div>
		
	</div>
	
	<div class="col-xs-5">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p><strong><h3 class="text-info">"Lab staff"</h3></strong></p>
				<p>
					<a href="{{ action('LabController@index') }}" class="btn btn-info btn-lg">Click Here</a>
				</p>
			</div>
		</div>

	</div>
	
</div>

@endsection