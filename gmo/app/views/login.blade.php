@extends('layout')

@section('title')
	GMO e-Government System
@endsection

@section('content')
<div class="row">
	
	<div class="col-xs-6 col-sm-offset-3">

		@if($errors->any())
			<div class="panel panel-danger" id="login-errors">
				<div class="panel-body">
					<strong>Invalid username or password.</strong>
				</div>
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
				{{ Form::open(array('action' => 'LoginController@login', 'class' => 'form-horizontal', 'id' => 'login-form')) }}
					<div class="form-group">
						{{ Form::label('username', 'Username', array('class' => 'col-xs-4 control-label')) }}
						<div class="col-xs-7">
							{{ Form::text('username', '', array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password', array('class' => 'col-xs-4 control-label')) }}
						<div class="col-xs-7">
							<input class="form-control" type="password" id="password" name="password">
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary btn-lg">
							Log In
						</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

</div>
@endsection
