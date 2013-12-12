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
                <td><a href="report/1">Domestic Plant Report</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="report/2">Lab Result Report</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
            <tr>
                <td>3</td>
                <td><a href="report/3">Non-GMO Certificate Request (1-1) Report</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
            <tr>
                <td>4</td>
                <td><a href="report/4">Non-GMO Certificate For Domestic Crops Request (1-2) Report</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
            <tr>
                <td>5</td>
                <td><a href="report/5">Destination Country</a></td>
                <td>01/01/2013</td>
                <td>31/12/2013</td>
            </tr>
        </tbody>
        </table>
    
</div>

@endsection
