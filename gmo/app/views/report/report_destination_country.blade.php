@extends('layout') 
@section('title') 
View Report 
@endsection 
@section('content')

<div class="panel-body text-center">
    <div class="row">
        <div class="text-center">
        <h3><span class="glyphicon glyphicon-file"></span> Destination Country
        (1/1/2013 - 31/12/2013)</h3><br>
        </div>
        <table class="table table-bordered table-striped text-left">
        <thead>
            <tr class="header" >
                <th>#</th>
                <th class="col-xs-2">Request ID</th>
                <th class="col-xs-3">Final Destination Country</th>
                <th>Port of Entry</th>
                <th class="col-xs-2">Requested Date</th>
            </tr>
        </thead>
        <tbody>
        <? $count = 1; ?>
        @foreach ($dest as $d) 
			<tr>
				<td>{{$count}}</td>
				<td>{{$d->export_certificate_request_id}}</td>
				<td>{{$d->final_destination}}</td>
				<td>{{$d->port_of_entry}}</td>
				<td>{{$d->created_at}}</td>
			</tr>
            <? $count++; ?>
        @endforeach
        </tbody>
        </table>
    </div>
    <a href="/staff/report" class="btn btn-primary">Back</a>
    
</div>

@endsection
