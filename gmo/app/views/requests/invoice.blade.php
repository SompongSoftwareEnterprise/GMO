<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
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
            <h1 align="center" style="margin-top:-20px">Invoice</h1>
            <h4 align="center">Department of Agriculture</h4>
            
            <br>
            <div class="row">
            <div class="col-sm-offset-6 col-xs-4 ">
                <div class="col-xs-3">
                    <strong>Office</strong>
                </div>
                <div class="col-xs-8 underline">Biotechnology Research</div>
                <div class="col-sm-offset-3 col-xs-8 underline">and Development Office</div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-offset-6 col-xs-4 ">
                <div class="col-xs-3">
                    <strong>Date</strong>
                </div>
                <div class="col-xs-8 underline">
                     @foreach ($signer_name as $sn) 
                      {{$sn->updated_at}} 
                     @endforeach
                </div>
            </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-2 col-xs-5 ">
                <div class="col-xs-5">
                    <strong>From</strong>
                </div>
                <div class="col-xs-7 underline">
                    @foreach ($signer_name as $sn) {{ $sn->name }} @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-sm-offset-2 col-xs-8">  
            <table class="table table-bordered " align="center">
                <thead>
                    <tr class="Header">
                        <th>List</th>
                        <th style="width: 20%">Price (Baht)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($price as $item)
                    <tr class="info">
                        <td>{{ $item['name'] }}</td>
                        <td class="text-center">{{ $item['price'] }}.00</td>
                    </tr>
                    @endforeach
                    <tr class="info">
                        <td>
                            <strong>Total</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{ $invoice->total_price }}.00</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-2 col-xs-5 ">
                <div class="col-xs-5">
                    <strong>Total price</strong>
                </div>
                <div class="col-xs-7 underline">
                  {{$invoice->total_price}}.00 Baht
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-offset-6 col-xs-4">
                <div class="col-xs-4">
                    <strong>Payer</strong>
                </div>
                <div class="col-xs-7 underline">{{$user->name}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-6 col-xs-4">
                <div class="col-xs-4">
                    <strong>Position</strong>
                </div>
                <div class="col-xs-7 underline">{{$user->role}}</div>
            </div>
        </div>
            
    </div>
    <br><br>

</body>

</html>


