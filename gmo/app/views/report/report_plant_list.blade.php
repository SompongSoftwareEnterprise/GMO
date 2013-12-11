@extends('layout') 
@section('title') 
View Report 
@endsection 
@section('content')

<div class="panel-body text-center">
    <div class="row">
        <!--            {{var_dump($example)}}-->
        <div class="text-center">
        <h3><span class="glyphicon glyphicon-file"></span> Domestic Plant (1/1/2013 - 31/12/2013)</h3><br>
<!--        <h4>Total : {{sizeof($example)}}</h4>-->
        </div>
        <table class="table table-bordered table-striped text-left">
        <thead>
            <tr class="header" >
                <th>#</th>
                <th>Plant Name</th>
                <th>Export Qty</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <? $count = 1; ?>
        @foreach ($example as $ex) 
			<tr>
				<td>{{$count}}</td>
				<td>{{$ex->plant_name_eng}}</td>
				<td>{{$ex->qty}}</td>
				<td>{{$ex->updated_at}}</td>
			</tr>
            <? $count++; ?>
        @endforeach
        </tbody>
        </table>
    </div>
    <a href="/staff/report" class="btn btn-primary">Back</a>
    
</div>

@endsection
