@extends('layout')
@section('title')
View All Requests
@endsection
@section('content')
{{Form::open(array('action' => array('StaffRequestsController@createLabTask', $id), 'class' => 'form-horizontal'))}}
<div class="panel-body ">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-example bs-example-tabs">  
                <div id="myTabContent" class="tab-content">
                    <!--  -->
                        <div class="row">
                            <div class="col-sm-offset-1 col-xs-4">
                                <h3>Detail Of Analysis</h3>
                            </div>
                        </div>
                        <br>
                        <!-- <form class="form-horizontal" role="form"> -->
                            <div class="form-group">
                                <label for="productCode" class="col-xs-3 control-label">Product Code</label>
                                <div class="col-xs-4">
                                    <input type="codeOfProduct" class="form-control" id="productCode" name="product_code" placeholder="ex. 111122223333">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productDetail" class="col-xs-3 control-label">Detail</label>
                                <div class="col-xs-4">
                                    <input type="detailOfProduct" class="form-control" id="productDetail" name="product_detail" placeholder="ex. Product Detail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="methodOfExtractinfDNA" class="col-xs-3 control-label">Medthod Of Extracting DNA</label>
                                <div class="col-xs-4">
                                    <input type="methodOfExtractingDNA" class="form-control" id="methodOfExtractinfDNA" name="method_of_extractinf_DNA" placeholder="ex. Boiling method">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detailOfAnalysis" class="col-xs-3 control-label">Method Of Seperating Gene</label>
                                <div class="col-xs-8">
                                    <div class="checkbox">
                                        <label> {{ Form::checkbox('transgene', 'PRC') }} PRC </label>
                                    </div>
                                    <div class="checkbox">
                                         <label> {{ Form::checkbox('transgene', 'real_time') }} Real-time </label>
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                        <hr>
                        <div class="row">
                            <div class="col-sm-offset-1 col-xs-4">
                                <h3>Gene Analysis</h3>
                            </div>
                        </div>
                        <br>
                        <!-- <form class="form-horizontal" role="form"> -->
                            <div class="form-group">
                                <label for="endogenous" class="col-xs-3 control-label">Endogenous</label>
                                <div class="col-xs-4">
                                    <input type="endogenous" class="form-control" id="endogenous" name="endogenous" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-3 control-label">
                                        Transgene
                                    </label>
                                    <div class="col-xs-3">
                                         {{ Form::checkbox('transgene', 'camv_35s_promoter') }}   CaMV 35S Promoter 
                                </div>
                                <div class="col-xs-3">
                                    {{ Form::checkbox('transgene', 'roundup_ready') }}  Roundup Ready  
                                </div>
                                <div class="col-xs-3">
                                     {{ Form::checkbox('transgene', 'nk_603') }}   NK 603
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-3 col-xs-3">
                                    {{ Form::checkbox('transgene', 'mon_810') }}   Mon 810
                                </div>
                                <div class="col-xs-3">
                                     {{ Form::checkbox('transgene', 'bt_176') }}   Bt176
                                </div>
                                <div class="col-xs-3">
                                    {{ Form::checkbox('transgene', 'nos_terminal') }}   NOS Terminal 
                                </div>
                            </div>
                        </div>
                    <!-- </form> -->
                    <hr>
                    <!--  -->
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-4">
                            <h3>Product List</h3>
                        </div>
                    </div>
                    <br>
                    <!-- <form class="form-horizontal" role="form"> -->
                        <!-- List1 -->
                        <div class="project-detail">
                            <div class="form-group">
                                <label for="productCode1" class="col-xs-3 control-label">Product Code</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="productCode1" name="product_codepj1" placeholder="ex. 111122223333">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productName1" class="col-xs-3 control-label">Product Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="productName1" name="product_namepj1" placeholder="ex. Jaturawit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="measure1" class="col-xs-3 control-label">Measure (g)</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="measure1" name="measurepj1" placeholder="ex. 13">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="volume1" class="col-xs-3 control-label">Volume (mL)</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="volume1" name="volumepj1" placeholder="ex. 12">
                                </div>
                            </div>
                            <!-- DateStart -->
                            <div class="form-group">
                                <label for="date1" class="col-xs-3 control-label">Date Start</label>
                                <div class="col-xs-1">
                                    <select id="date1" class="form-control" name="dateStartpj1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select class="form-control" name="monthStartpj1">
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option> 
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select class="form-control" name="yearStartpj1">
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                    </select>
                                </div>
                            </div>
                            <!-- DateFinish -->
                            <div class="form-group">
                                <label for="date1" class="col-xs-3 control-label">Date Finish</label>
                                <div class="col-xs-1">
                                    <select class="form-control" name="dateFinishpj1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select class="form-control" name="monthFinishpj1">
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option> 
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select class="form-control" name="yearFinishpj1">
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-1">
                                        <button data-gmo-project="remove" type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                    <div class="col-xs-2">
                                        <button data-gmo-project="add" type="button" class="btn btn-primary text-left">Add Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Project -->
                        <script>
                            $(function() {
                                var template = $('.project-detail').html()
                                $(document).on('click', '[data-gmo-project="remove"]', function(e) {
                                    if ($('.project-detail').length == 1) {
                                        alert('Cannot remove last example')
                                    } else {
                                        $(this).closest('.project-detail').remove()
                                        updateNumber()
                                    }
                                })
                                var pjId = 1
                                $(document).on('click', '[data-gmo-project="add"]', function(e) {
                                    pjId += 1
                                    $(this).closest('.project-detail').after(
                                        '<div class="project-detail">' +
                                            template.replace(/pj1/g, 'pj' + pjId) +
                                        '</div>')
                                    updateNumber()
                                })
                                function updateNumber() {
                                    $('.project-detail').each(function(index) {
                                        $(this).find('[data-gmo-project="number"]').html(index + 1 + '')
                                    })
                                }
                            })
                        </script>
                        <!-- End Add Project -->
                        <!-- List2 -->
                        <hr>
                        <div class="row">
                            <div class="col-sm-offset-1 col-xs-4">
                                <h3>Responsible</h3>
                            </div>
                        </div>
                        <br>
                        <div class="responsible-detail">
                            <div class="form-group">
                                <label for="responsible1" class="col-xs-3 control-label">Responsible # <span data-gmo-responsible="number">1</span></label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="responsible1" name="responsiblerp1" placeholder="ex. Somchai Rakdee">
                                </div>
                                <div class="row">
                                    <div class="col-xs-1">
                                        <button data-gmo-responsible="remove" type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                    <div class="col-xs-1">
                                        <button data-gmo-responsible="add" type="button" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Responsible -->
                        <script>
                            $(function() {
                                var template = $('.responsible-detail').html()
                                $(document).on('click', '[data-gmo-responsible="remove"]', function(e) {
                                    if ($('.responsible-detail').length == 1) {
                                        alert('Cannot remove last example')
                                    } else {
                                        $(this).closest('.responsible-detail').remove()
                                        updateNumber()
                                    }
                                })
                                var rpId = 1
                                $(document).on('click', '[data-gmo-responsible="add"]', function(e) {
                                    rpId += 1
                                    $(this).closest('.responsible-detail').after(
                                        '<div class="responsible-detail">' +
                                            template.replace(/rp1/g, 'rp' + rpId) +
                                        '</div>')
                                    updateNumber()
                                })
                                function updateNumber() {
                                    $('.responsible-detail').each(function(index) {
                                        $(this).find('[data-gmo-responsible="number"]').html(index + 1 + '')
                                    })
                                }
                            })
                        </script>
                        <!-- End Add Responsible -->
                <br>
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-4">
                        <button type="button" class="btn btn-default">Back</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
{{Form::close()}}
@endsection