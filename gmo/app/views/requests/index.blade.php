@extends('layout')

@section('title')
Create Certificate Request Form
@endsection

@section('content')
<div class="panel-body">

	<form class="form-inline" role="search" name="searchForm">
		<div class="form-group">
			<label class="sr-only" for="searchInput">Search Input</label>
			<input type="text" class="form-control" id="searchInput" placeholder="Enter search keyword.." name="search_input">
		</div>


		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="search-dropdown" id="searchDropdown">
				Action <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">Search by Request ID</a></li>
				<li><a href="#">Search by Importer Name</a></li>
				<li><a href="#">Search by Requester</a></li>
			</ul>
		</div>

		<button type="submit" class="btn btn-primary">Search</button>
	</form>

	<br>

	<table class="table table-bordered">
		<thead>
			{{ View::make('requests/table/header') }}
		</thead>
		<tbody>
			<?php $row = View::make('requests/table/row'); ?>
			@foreach($certReqs as $certReq)
				{{ $row->with('certReq', $certReq); }}
			@endforeach
		</tbody>
	</table>

	<br>

	<a href="/entrepreneur/requests/new">
		<button type="button" class="btn btn-default">Make New Request</button>
	</a>

</div>

@endsection
