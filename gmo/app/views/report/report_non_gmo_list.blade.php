<!DOCTYPE html>
<html>

<head>
    <title>Report NON-GMO</title>
    <meta charset="utf-8">
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/common.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/promise-3.2.0.js"></script>
    <script src="/assets/js/common.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body{
            background:#fff;
        }
        .underline{
/*            text-decoration: underline;*/
            border-bottom: 1px solid #aaa;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div align="center">
                <img class="logo pull-center" src="/assets/img/bird.png">
            </div>
            <div align="center"><p><h4>NON-GMO CERTIFICATE REQUEST(1-1) REPORT</h4>
            <br>BIOTECHNOLOGY RESEARCH AND DEVELOPMENT OFFICE 
            <br>DEPARTMENT OF AGRICULTURE MINISTRY 
            <br>OF AGRICULTURE AND COOPERATIVES BANGKOK, THAILAND
            </p>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-offset-2 col-xs-6">
                    <b>Period of information : </b>{{$date['first']->updated_at}} - {{$date['last']->updated_at}}
                    <br>
                    <b>Total :</b> {{count($datas)}}<br>
                    <b>Pass :</b> {{count($datas)-count($notP)}}<br>
                    <b>Not Pass :</b> {{count($notP)}}<br>
                </div>
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

            
    </div>
    <br><br>

</body>

</html>


