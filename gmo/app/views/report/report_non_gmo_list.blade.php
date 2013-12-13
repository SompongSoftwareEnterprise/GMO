@extends('layout') 
@section('title') 
View Report 
@endsection 
@section('content')

<div class="panel-body text-center">


            <div class="row">
                <div class="text-center">
                <h3><span class="glyphicon glyphicon-file"></span> Non-GMO List
                    ({{$date['first']->updated_at}} - {{$date['last']->updated_at}})</h3><br>
                </div>
              <!--   <div class="col-sm-offset-2 col-xs-6">
                    <br>
                    <b>Total :</b> {{count($datas)}}<br>
                    <b>Pass :</b> {{count($datas)-count($notP)}}<br>
                    <b>Not Pass :</b> {{count($notP)}}<br>
                </div> -->
            </div>
            <br>
            <div class="row">
                <div class="col-sm-offset-2 col-xs-8">  
                    <table class="table table-bordered " align="center">
                        <thead>
                            <tr class="Header">
                                <th>No.</th>
                                <th>Req. No.</th>
                                <th>Requester</th>
                                <th>Request Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $i = 1; ?>
                            @foreach ($datas as $data)
                            <tr class="info">
                                <td>{{$i++}}</td>
                                <td>{{ $data->reference_id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{$data->updated_at}}</td>
                                <td>{{$data->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    <br><br>

@endsection


