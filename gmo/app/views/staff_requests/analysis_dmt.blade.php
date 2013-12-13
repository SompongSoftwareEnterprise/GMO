<!DOCTYPE html>
<html>

<head>
    <title>Analysis of Report</title>
    <meta charset="utf-8">
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/common.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/promise-3.2.0.js"></script>
    <script src="/assets/js/common.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <style>

        body {
            background: #fff;
        }
        .logo {
            margin-bottom: -30px;
        }
        .row {
            margin-top: 10px;
            padding-bottom: 10px;
        }
        .section {
            border-bottom: 1px solid black;   
        }
        .certificate > p {
            margin: 0px;
        }
        .sign-left {
            height: 200px; 
            border-right: 1px solid black;
        }
        .sign-right {
            height: 200px;
        .text-center {
            text-align: center;   
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row section">
            <div class="col-xs-4 text-center">
                <img class="logo" src="/assets/img/bird.png">
            </div>
            <div class="col-xs-8 certificate text-center" style="margin-top: 55px;">
                <strong>ANALYSIS OF REPORT</strong>
                <p>BIOTECHNOLOGY RESEARCH</p>
                <p>AND DEVELOPMENT OFFICE</p>
                <p>DEPARTMENT OF AGRICULTURE MINISTRY</p>
                <p>OF AGRICULTURE AND COOPERATIVES BANGKOK, THAILAND</p>
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-12 certificate text-center">
                <strong>COMMON NAME</strong>
                <p>{{ $exportCertificate['sample_name'] }}</p>
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-6 certificate">
                <strong>MANUFACTURER OR SHIPPER</strong>
                <p>{{ $dmtCertRequestForm['company_en'] }}</p>
            </div>
            <div class="col-xs-6 certificate">
                <strong>ADDRESS</strong>
                <p>{{ $dmtCertRequestForm['address_en'] }}</p>
                <p>{{ $dmtCertRequestForm['address_en2'] }}</p>
                <p>{{ $dmtCertRequestForm['city_en'] }}, {{ $dmtCertRequestForm['province_en'] }}, Thailand, {{ $dmtCertRequestForm['zip'] }}</p>
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-6 certificate">
                <strong>VENDOR OR CONSIGNEE</strong>
                <p>{{ $dmtCertRequestForm['company_en'] }}</p>
            </div>
            <div class="col-xs-6 certificate">
                <strong>ADDRESS</strong>
                <p>{{ $dmtCertRequestForm['address_en'] }}</p>
                <p>{{ $dmtCertRequestForm['address_en2'] }}</p>
                <p>{{ $dmtCertRequestForm['city_en'] }}, {{ $dmtCertRequestForm['province_en'] }}, Thailand, {{ $dmtCertRequestForm['zip'] }}</p>
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-12 certificate">
                <strong>DESCRIPTION OF PRODUCT</strong>
                <p>{{ $dmtCertRequestEx['plant_name_eng'] }}</p>
                <p>{{ $dmtCertRequestEx['plant_name_th'] }}</p> 
                <p>{{ $dmtCertRequestEx['plant_name_sci'] }}</p> 
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-4 certificate">
                <strong>COUNTRY OF ORIGIN</strong>
                <p>Thailand</p>
            </div>
            <div class="col-xs-4 certificate">
                <strong>FINAL DESTINATION</strong>
                <p>{{ $dmtCertRequestEx['export_to'] }}</p>
            </div>
            <div class="col-xs-4 certificate">
                <strong>PORT OF ENTRY OR EMBARKATION</strong>
                <p>{{ $dmtCertRequestEx['export_to'] }}</p>
            </div>
        </div>
        <div class="row" style="padding-bottom: 0px;">
            <div class="col-xs-12 certificate">
                <strong>TEST RESULT</strong>
                <!-- <p>This sample was tested for presense of HWAMI sweet corn DNA with the following result:-</p> -->
                <p>This sample was tested with the following result:-</p>
            </div>
        </div>
        <div class="row section" style="margin-top: 0px;">
            <div class="col-xs-6 certificate">
                <?php foreach($exportCertificateTest as $ect) { ?>
                    <p>{{ $ect->type }}</p>
                <?php } ?>
                <!-- <p>Detection of 35S Promoter</p> -->
                <!-- <p>Detection of Nos Terminator</p> -->
                <!-- <p>Control Reaction</p> -->
                <!-- <p>Positive Control</p> -->
                <!-- <p>Negative Control</p> -->
            </div>
            <div class="col-xs-6 certificate">
                <?php foreach($exportCertificateTest as $ect) { ?>
                    <p>{{ $ect->result }}</p>
                <?php } ?>
                <!-- <p>Negative</p>
                <p>Negative</p>
                <p>Satisfactory</p>
                <p>Positive</p>
                <p>Negative</p> -->
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-12 certificate">
                <strong>CONCLUSION</strong>
                <p>{{ $exportCertificate['conclusion'] }}</p>
            </div>
        </div>
        <div class="row section">
            <div class="col-xs-6 sign-left">
                <div class="row" style="margin-top: 0px;">
                    <div class="col-xs-12 certificate">
                        <strong>APPROVED BY</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 certificate text-center" style="margin-top: 100px">
                        <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                        <p>ANALYST/HEAD LABORATORY</p>
                        <p>DATE ..................</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 sign-right">
                <div class="row" style="margin-top: 0px;">
                    <div class="col-xs-12 certificate">
                        <strong>CERTIFIED</strong></strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 certificate">
                <p>No financial liability shall attach to the Department of Agriculture (DOA), Thailand, officer of representative of the Ministry with respect to this certificate.</p>
                <p>These results relate only to the sample(s) tested and do not guarantee the bulk of the material to be of equal quality.</p>
                <p>DOA staffs were not responsible for the taking of samples. DOA cannot be held liable of the use to which the information is put.</p>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
