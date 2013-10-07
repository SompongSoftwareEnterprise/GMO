@extends('layout')

@section('title')
Registration
@endsection

@section('content')


{{ Form::open(array('action' => 'RegistrationController@submitRegister')) }}

	{{ Form::hidden('is_agency', $is_agency); }}

	@if($errors->any())
		<div class="row">
			<div class="col-sm-offset-1 col-xs-10">
				{{ View::make('errors') }}
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-sm-offset-1 col-xs-10">
			<div class="checkbox">
				<label>
					{{ Form::checkbox('is_company', '1') }} Company
				</label>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('first_name', 'First Name') }}
				{{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => '')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('last_name', 'Last Name') }}
				{{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => '')) }}
			</div>
		</div>
		
	</div>	

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				<label>Sex</label>
				<div class="form-inline">
					<div class="radio">
						<label>
							{{ Form::radio('sex', 'M') }} Male
						</label>
					</div>
					<div class="radio">
						<label>
							{{ Form::radio('sex', 'F') }} Female
						</label>
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				<label for="date_of_birth">Date of Birth</label>
				<div class="row">
					{{ Form::date('date_of_birth') }}
				</div>
			</div>
		</div>
		
	</div>

	<div class="row">

		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('nationality', 'Nationality') }}
				{{ Form::text('nationality', '', array('class' => 'form-control', 'placeholder' => 'ex. Thai')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('country', 'Country') }}
				{{ Form::text('country', '', array('class' => 'form-control', 'placeholder' => 'ex. Thailand')) }}
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('address1', 'Address') }}
				{{ Form::text('address1', '', array('class' => 'form-control', 'placeholder' => 'Address Line 1')) }}
				{{ Form::text('address2', '', array('class' => 'form-control', 'placeholder' => 'Address Line 2')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('city', 'City') }}
				{{ Form::text('city', '', array('class' => 'form-control', 'placeholder' => 'ex. Bangkok')) }}
			</div>
		</div>
	</div>

	<div class="row">
		
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => '')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('phone', 'Phone') }}
				{{ Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'ex. 02-345-6789')) }}
			</div>
		</div>
		
	</div>

	<div class="row">
		
		<div class="col-sm-offset-1 col-xs-5">
			<div class="form-group">
				{{ Form::label('fax', 'Fax') }}
				{{ Form::text('fax', '', array('class' => 'form-control', 'placeholder' => 'ex. 02-345-6789')) }}
			</div>
		</div>
		
		<div class="col-xs-5">
			<div class="form-group">
				{{ Form::label('mobile', 'Mobile Phone') }}
				{{ Form::text('mobile', '', array('class' => 'form-control', 'placeholder' => 'ex. 081-234-5678')) }}
			</div>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-sm-offset-1 col-xs-10 text-right">
			<input type="reset" class="btn btn-default" value="Reset">
			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
	</div>

{{ Form::close() }}

@endsection