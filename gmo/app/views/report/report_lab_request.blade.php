@extends('layout') 
@section('title') 
View Report 
@endsection 
@section('content')

<div class="panel-body text-center">
    <div class="row">
        <!--            {{var_dump($lab)}}-->
        <div class="text-center">
        <h3><span class="glyphicon glyphicon-file"></span> Lab Request
        (1/1/2013 - 31/12/2013)</h3><br>
        </div>
        <table class="table table-bordered table-striped text-left">
        <thead>
            <tr class="header" >
                <th>#</th>
                <th class="col-xs-2">Lab Request ID</th>
                <th class="col-xs-2">Product ID</th>
                <th>Product Name</th>
                <th class="col-xs-3">Requested Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <? $count = 1; ?>
        @foreach ($lab as $lab_req) 
			<tr>
				<td>{{$count}}</td>
				<td>{{$lab_req->lab_task_id}}</td>
				<td>{{$lab_req->product_code}}</td>
				<td>{{$lab_req->product_name}}</td>
				<td>{{$lab_req->created_at}}</td>
				<td>{{$lab_req->status}}</td>
			</tr>
            <? $count++; ?>
        @endforeach
        </tbody>
        </table>
    </div>
    <a href="/staff/report" class="btn btn-primary">Back</a>
    
</div>

@endsection
