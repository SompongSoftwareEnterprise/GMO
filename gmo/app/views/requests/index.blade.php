@extends('layout')

@section('title')
View Certificate Request
@endsection

@section('content')
<div class="panel-body entrepreneur-page">
	{{ Form::open(array(
			'action' => array('EntrepreneurRequestsController@search'),
			'class' => 'form-inline',
			'name' => 'searchForm',
			'id' => 'entrepreneur_requests_search_form'
		)) }}
	<!-- <form class="form-inline" role="search" name="searchForm" id="entrepreneur_requests_search_form"> -->
		<div class="form-group">
			<label class="sr-only" for="searchInput">Search Input</label>
			<input type="text" class="form-control" id="searchInput" placeholder="Enter search keyword.." name="search_input">
		</div>


		<div class="btn-group">
			<input type="hidden" id="entrepreneur_requests_search_by" name="search_by" value="">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="search-dropdown" id="searchDropdown">
				<span id="entrepreneur_requests_search_by_text">Action</span> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="javascript://" data-set-input="search_by=request_id">Search by Request ID</a></li>
				<li><a href="javascript://" data-set-input="search_by=importer_name">Search by Importer Name</a></li>
				<li><a href="javascript://" data-set-input="search_by=requester">Search by Requester</a></li>
			</ul>
		</div>

		<button type="submit" id="entrepreneur_requests_search_button" class="btn btn-primary">Search</button>
	<!-- </form> -->
	{{Form::close()}}

	<br>

	<table class="table table-bordered">
		<thead>
			{{ View::make('requests/table/header') }}
		</thead>
		<tbody>
			<?php if ($certReqs != null) { ?>
			<?php $row = null; ?>
			@foreach($certReqs as $certReq)
				<tr>
					<!-- {{var_dump($certReq)}} -->
					<td><a href="/entrepreneur/requests/{{ $certReq->reference_id }}">{{ $certReq->reference_id }}</a></td>
					<td>{{ $certReq->owner_first_name }} {{ $certReq->owner_last_name }}</td>
					<td>{{ $certReq->signer_first_name }} {{ $certReq->signer_last_name }}</td>
					<td>{{ $certReq->created_at }}</td>
					<?php if ($certReq->status == 'Payment Required' || $certReq->status == 'Document Needed') { ?>
					<td class="text-danger">{{ $certReq->status }}</td>
					<?php } else if ($certReq->status == 'Available') { ?>
					<td class="text-success">{{ $certReq->status }}</td>
					<?php } else { ?>
					<td class="text-warning">{{ $certReq->status }}</td>
					<?php } ?>
				</tr>
			@endforeach
			<?php } ?>
			<?php if ($dmtCertReqs != null) { ?>
			<?php $row = null; ?>
			@foreach($dmtCertReqs as $dmtCertReq)
				<tr>
					<td><a href="/entrepreneur/dmt-requests/{{ $dmtCertReq->reference_id }}">{{ $dmtCertReq->reference_id }}</a></td>
					<td>{{ $dmtCertReq->owner_first_name }} {{ $dmtCertReq->owner_last_name }}</td>
					<td>{{ $dmtCertReq->signer_first_name }} {{ $dmtCertReq->signer_last_name }}</td>
					<td>{{ $dmtCertReq->created_at }}</td>
					<?php if ($dmtCertReq->status == 'Payment Required' || $dmtCertReq->status == 'Document Needed') { ?>
					<td class="text-danger">{{ $dmtCertReq->status }}</td>
					<?php } else if ($dmtCertReq->status == 'Available') { ?>
					<td class="text-success">{{ $dmtCertReq->status }}</td>
					<?php } else { ?>
					<td class="text-warning">{{ $dmtCertReq->status }}</td>
					<?php } ?>
				</tr>
			@endforeach
			<?php } ?>
		</tbody>
	</table>

	<br>

	<a href="/entrepreneur/requests/new">
		<button type="button" class="btn btn-default" id="make-111">Make New สทช 1-1/1 Request</button>
	</a>
	<a href="/entrepreneur/dmt-requests/new">
		<button type="button" class="btn btn-default" id="make-121">Make New สทช 1-2/1 Request</button>
	</a>

</div>

@endsection
