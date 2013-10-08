@extends('layout')

@section('title')
Edit Account Information
@endsection

@section('content')

{{ Form::open(array('route' => 'entrepreneur.save')) }}

<input type="hidden" name="id" value="{{$entrepreneur['id']}}" id="id"/>
<div class ="row form-group">
	<label for="sampleLabel" class="col-xs-3 control-label text-right"> Account Type:</label>
	<div class="col-xs-9 control-label">Customer</div>
</div> 

<div class ="row form-group">
	<label for="username" class="col-xs-3 control-label text-right"> User ID:</label>
	<div class="col-xs-4 control-label">
	<input  style="float:center;" class="form-control" type="text" value="{{$entrepreneur['user_id']}}" id="username" name="username" placeholder="ex. username"/> 
	</div>
</div> 

<div class ="row form-group">
	<label for="old_password" class="col-xs-3 control-label text-right"> Old Password:</label>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" type="password" id="old_password" name="old_password" placeholder="ex. ********"/> 
	</div>
</div> 

<div class ="row form-group">
	<label for="password" class="col-xs-3 control-label text-right"> New Password:</label>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" type="password" id="password" name="password" placeholder="ex. ********"/> 
	</div>
</div> 

<div class ="row form-group">
	<label for="password_confirmation" class="col-xs-3 control-label text-right"> Confirm New Password:</label>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="ex. ********"/> 
	</div>
</div> 

<div class ="row form-group">
	<label for="first_name" class="col-xs-3 control-label text-right"> First Name:</label>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" value="{{$entrepreneur['first_name']}}" type="text" id="first_name" name="first_name" placeholder="ex. Kanisorn"/> 
	</div>
</div> 

<div class ="row form-group">
	<label for="last_name" class="col-xs-3 control-label text-right"> Last Name:</label>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" value="{{$entrepreneur['last_name']}}" type="text" id="last_name" name="last_name" placeholder="ex. Wirutkul"/> 
	</div>
</div> 

<div class ="form-group">
	<div class="row">
		<label for="address1" class="col-xs-3 control-label text-right"> Address:</label>
		<div class="col-xs-8 control-label">
			<input  style="float:center;" class="form-control" value="{{$entrepreneur['address1']}}" type="text" id="address1" name="address1" placeholder="ex. 129 Paholyothin Road."/> 
		</div>
	</div>
</div> 

<div class="row form-group">
	<div class="col-xs-3 control-label"></div>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" value="{{$entrepreneur['address2']}}" type="text" id="address2" name="address2" placeholder="Address2"/> 
	</div>
	<div class="col-xs-4 control-label">
		<input  style="float:center;" class="form-control" value="{{$entrepreneur['city']}}" type="text" id="city" name="city" placeholder="Town/City"/> 
	</div>
</div>

<div class ="row form-group">
	<label for="country" class="col-xs-3 control-label text-right"> Country:</label>
	<div class="col-xs-4 control-label">
		<input  class="form-control" value="{{$entrepreneur['country']}}" type="text" id="country" name="country" placeholder="ex. Thailand"/> 
	</div>
</div>

<div class ="row form-group">
	<label for="zipcode" class="col-xs-3 control-label text-right"> Email:</label>
	<div class="col-xs-4 control-label">
		<input  class="form-control" value="{{$entrepreneur['email']}}" type="email" id="email" name="email" placeholder="ex. 213@456@abcmail.com" maxlength="5" /> 
	</div>
</div>

<div class ="row form-group">
	<label for="phone" class="col-xs-3 control-label text-right"> Phone:</label>
	<div class="col-xs-4 control-label">
		<input  class="form-control" value="{{$entrepreneur['phone']}}" type="text" id="phone" name="phone" placeholder="ex. 0876566563" maxlength="10" /> 
	</div>
</div>

<div class="col-sm-offset-9 col-sm-5">
	<button type="submit" class="btn btn-primary">Save</button>
	<button type="reset" class="btn btn-danger">Reset</button>
	<button type="button" class="btn btn-default">Back</button>
</div>
</div>

{{Form::close()}}


@endsection