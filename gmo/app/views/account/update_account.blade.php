@extends('layout')

@section('title')
	Account Information
@endsection

@section('content')
	@if($status)
	<div class="row">
		<div class="col-xs-1 text-right"></div>
		Account Information has been updated.
		<div class="col-xs-9 text-right">
			<a href="{{action('EntrepreneurController@index')}}" class="btn btn-primary">back</a>
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-xs-1 text-right"></div>
		Fail to update, please try again.
	</div>
	<div class="row">
		<div class="col-xs-9 text-right">
			<a href="{{action('EntrepreneurController@index')}}" class="btn btn-danger btn-lg">back</a>
		</div>
	</div>
	@endif
@endsection