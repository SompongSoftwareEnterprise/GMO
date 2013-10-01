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
					<a href="/staff/register/customer" class="btn btn-primary btn-lg">Click Here</a>
				</p>
			</div>
		</div>
		
	</div>
	
	<div class="col-xs-5">
	
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<p>If you are<br><strong>"Agency"</strong></p>
				<p>
					<button type="button" class="btn btn-primary btn-lg">Click Here</button>
				</p>
			</div>
		</div>
	
	</div>
	
</div>


@endsection