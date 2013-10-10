@extends('layout')

@section('title')
View All Requests
@endsection

@section('content')

<div class="panel-body ">

  <div class="row">
    <div class="col-xs-12">
      <div class="bs-example bs-example-tabs">  

        <div id="myTabContent" class="tab-content">
          <div class="row">
            <div class="col-sm-offset-1 col-xs-4">
              <h3>Product List</h3>
            </div>
          </div>

          <br>
          <form class="form-horizontal" role="form">

            <!-- List1 -->
            <div class="form-group">
              <label for="productCode1" class="col-xs-3 control-label">Product Code</label>

              <div class="col-xs-4">
                <input type="text" class="form-control" id="productCode1" name="product_code" placeholder="ex. 111122223333">
              </div>
            </div>

            <div class="form-group">
              <label for="productName1" class="col-xs-3 control-label">Product Name</label>
              <div class="col-xs-4">
                <input type="text" class="form-control" id="productName1" name="product_name" placeholder="ex. Jaturawit">
              </div>
            </div>

            <div class="form-group">
              <label for="measure1" class="col-xs-3 control-label">Measure (g)</label>
              <div class="col-xs-4">
                <input type="text" class="form-control" id="measure1" name="measure" placeholder="ex. 13">
              </div>
            </div>

            <div class="form-group">
              <label for="volume1" class="col-xs-3 control-label">Volume (mL)</label>
              <div class="col-xs-4">
                <input type="text" class="form-control" id="volume1" name="volume" placeholder="ex. 12">
              </div>
            </div>

            <!-- DateStart -->
            <div class="form-group">
              <label for="date1" class="col-xs-3 control-label">Date Start</label>

              <div class="col-xs-1">

                <select id="date1" class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

              <div class="col-xs-2">
                <select class="form-control">
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option> 
                </select>
              </div>



              <div class="col-xs-2">
                <select class="form-control">
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

                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

              <div class="col-xs-2">
                <select class="form-control">
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option> 
                </select>
              </div>



              <div class="col-xs-2">
                <select class="form-control">
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                </select>
              </div>


              <div class="form-group">
                <div class="col-xs-1">
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>

                <div class="col-xs-2">
                  <button type="button" class="btn btn-primary text-left">Add Project</button>
                </div>

              </div>

            </div>



            <!-- List2 -->

            <hr>

            <div class="row">
              <div class="col-sm-offset-1 col-xs-4">
                <h3>Responsible</h3>
              </div>
            </div>
            <br>


            <div class="form-group">
              <label for="responsible1" class="col-xs-3 control-label">Responsible # 1</label>

              <div class="col-xs-4">
                <input type="text" class="form-control" id="responsible1" name="responsible1" placeholder="ex. Somchai Rakdee">
              </div>

              <div class="row">
                <div class="col-xs-1">
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>

            </div>
            <div class="form-group">
              <label for="responsible1" class="col-xs-3 control-label">Responsible # 2</label>

              <div class="col-xs-4">
                <input type="text" class="form-control" id="responsible1" name="responsible1" placeholder="ex. Somsri Rakna">
              </div>

              <div class="row">
                <div class="col-xs-1">
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="responsible1" class="col-xs-3 control-label">Responsible # 3</label>

              <div class="col-xs-4">
                <input type="text" class="form-control" id="responsible1" name="responsible1" placeholder="ex. Sompong Raksuk">
              </div>

              <div class="row">
                <div class="col-xs-1">
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
                <div class="col-xs-2">
                  <button type="button" class="btn btn-primary text-left">Add Project</button>
                </div>
              </div>
            </div>



            <hr>
            <div class="row">
              <div class="col-sm-offset-1 col-xs-4">
                <h3>Detail Of Analysis</h3>
              </div>
            </div>
            <br>

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
                  <label><input type="checkbox" id="PRC" name="PRC">PRC</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" id="realTime" name="real_time">Real-time</label>
                </div>
              </div>
            </div>
            <hr>


            <div class="row">
              <div class="col-sm-offset-1 col-xs-4">
                <h3>Gene Analysis</h3>
              </div>
            </div>
            <br>

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
                  <input type="checkbox" id="CaMV35sPromoter" name="camv_35s_promoter">   CaMV 35S Promoter
                </div>

                <div class="col-xs-3">
                  <input type="checkbox" id="roundUpReady" name="roundup_ready">   Roundup Ready
                </div>
                <div class="col-xs-3">
                  <input type="checkbox" id="nk603" name="nk_603">   NK 603
                </div>

              </div>

              <div class="row">
                <div class="col-sm-offset-3 col-xs-3">
                  <input type="checkbox" id="mon810" name="Mon_810">   Mon 810
                </div>

                <div class="col-xs-3">
                  <input type="checkbox" id="bt176" name="bt_176">   Bt176
                </div>

                <div class="col-xs-3">
                  <input type="checkbox" id="nosTerminal" name="nos_terminal">   NOS Terminal
                </div>
              </div>

            </div>

          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-offset-8 col-sm-4">
            <button type="button" class="btn btn-default">Back</button>
            <button type="button" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>



      </form>




    </div>
  </div>
</div>

@endsection