@extends('layout')

@section('title')
	Registration
@endsection

@section('content')

<div class="row">
	
	<div class="col-sm-offset-1 col-xs-5">
	
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p>If you are<br><strong>"Customer"</strong></p>
				<p>
					<a href="{{ action('RegistrationController@registerCustomer') }}" class="btn btn-primary btn-lg" id="register-customer">Click Here</a>
				</p>
			</div>
		</div>
		
	</div>
	
	<div class="col-xs-5">
	
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p>If you are<br><strong>"Agency"</strong></p>
				<p>
					<a href="{{ action('RegistrationController@registerAgency') }}" class="btn btn-primary btn-lg" id="register-agency">Click Here</a>
				</p>
			</div>
		</div>
	
	</div>
	
</div>


@endsection
