@extends('layout')

@section('title')
Lab Task
@endsection

@section('content')
	Lab Task has already created.
	<div class="form-group">
        <div class="col-sm-offset-8 col-sm-4">
            <a href="{{action('StaffRequestsController@index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection