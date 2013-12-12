@extends('layout') 
@section('title') 
View Report 
@endsection 
@section('content')

<div class="panel-body ">
        <table class="table table-bordered table-striped text-left">
        <thead>
            <tr class="header" >
                <th>#</th>
                <th>Report</th>
                <th>Start Period</th>
                <th>End Period</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><a href="report/1">Domestic Plant</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="report/1">Lab Result</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
        </tbody>
        </table>
    
</div>

@endsection
