@extends('layout')

@section('title')
Edit Account Information
@endsection

@section('content')

{{ Form::model($entrepreneur, array('action' => 'EntrepreneurAccountController@saveAccount')) }}

<div class="form-horizontal">

	{{ View::make('errors_row') }}

	<div class="row">
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				<label for="sampleLabel">Account Type</label>
				<div class="col-xs-9">Customer</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('first_name', 'First Name', array('data-label-company' => 'Company Name')) }}
				<!-- {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => '', 'disabled')) }} -->
				{{ $entrepreneur->first_name }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group individual">
				{{ Form::label('last_name', 'Last Name') }}
				<!-- {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => '', 'disabled')) }} -->
				{{ $entrepreneur->last_name }}
			</div>
		</div>
		
	</div>	

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('old-password', 'Old Password') }}
				{{ Form::password('old_password', null, array('class' => 'form-control', 'placeholder' => 'ex. ********')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
<!-- TODO change type to password -->
			<div class="form-group">
				{{ Form::label('password', 'New Password') }}
				{{ Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'new password')) }}
				{{ Form::password('password_confirmation', null, array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'confirm password')) }}
			</div>
		</div>
		
	</div>

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group individual">
				<label>Sex</label>
				<div class="form-inline">
					@if($entrepreneur->sex == 'M')
						Male
					@else
						Female
					@endif
				</div>
				
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group individual">
				<label for="date_of_birth">Date of Birth</label>
				<div class="row">
					{{ $entrepreneur->date_of_birth }}
					<!-- {{ Form::date('date_of_birth', InputDate::parse('date_of_birth')) }} -->
				</div>
			</div>
		</div>
		
	</div>

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('nationality', 'Nationality') }}
				<!-- {{ Form::text('nationality', null, array('class' => 'form-control', 'placeholder' => 'ex. Thai')) }} -->
				{{ $entrepreneur->nationality }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('country', 'Country') }}
				{{ Form::text('country', null, array('class' => 'form-control', 'placeholder' => 'ex. Thailand')) }}
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('address1', 'Address') }}
				{{ Form::text('address1', null, array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
				{{ Form::text('address2', null, array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('city', 'City') }}
				{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'ex. Bang Khen')) }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('province', 'Province') }}
				{{ Form::text('province', null, array('class' => 'form-control', 'placeholder' => 'ex. Bangkok')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('zip', 'Postal Code') }}
				{{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'ex. 12345')) }}
			</div>
		</div>
	</div>

	<div class="row">
		
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => '')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('phone', 'Phone') }}
				{{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'ex. 02-345-6789')) }}
			</div>
		</div>
		
	</div>

	<div class="row">
		
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('fax', 'Fax') }}
				{{ Form::text('fax', null, array('class' => 'form-control', 'placeholder' => 'ex. 02-345-6789')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('mobile', 'Mobile Phone') }}
				{{ Form::text('mobile', null, array('class' => 'form-control', 'placeholder' => 'ex. 081-234-5678')) }}
			</div>
		</div>
		
	</div>

</div>


<div class="col-sm-offset-9 col-sm-5">
	<a href="{{ action('EntrepreneurAccountController@index') }}" class="btn btn-default">Back</a>
	<button type="reset" class="btn btn-danger">Reset</button>
	<button type="submit" class="btn btn-primary">Save</button>
</div>
</div>

{{Form::close()}}


@endsection
