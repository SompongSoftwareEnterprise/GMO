@extends('layout')

@section('title')
View Lab Task
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="form-horizontal">

    @foreach ($products as $product)
      <div class="form-group">
        <label for="inputCodeOfProduct1" class="col-sm-2 control-label">Product Code :</label>
        <div class="col-sm-8">
          <p>{{$product['product_code']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="inputNameOfProduct1" class="col-sm-2 control-label">Product Name :</label>
        <div class="col-sm-8">
          <p>{{$product['product_name']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="measureAndVolume1" class="col-sm-2 control-label">Measure :</label>
        <div class="col-sm-8">
          <p>{{$product['measure']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="measureAndVolume1" class="col-sm-2 control-label">Volume :</label>
        <div class="col-sm-8">
          <p>{{$product['volume']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="dateStart1" class="col-sm-2 control-label">Date Start:</label>
        <div class="col-sm-8">
          <p>{{$product['start']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="dateStart1" class="col-sm-2 control-label">Date Finish:</label>
        <div class="col-sm-8">
          <p>{{$product['finish']}}</p>
        </div>
      </div>
      <hr/>
      @endforeach


      <div class="form-group">
        <label for="responsible" class="col-sm-2 control-label">Responsible :</label>
        <div class="col-sm-8">
        <? $no = 1; ?>
          @foreach($assignees as $assignee)
            <p>{{$no++.".".$assignee['assignee']}}</p>
          @endforeach
        </div>
      </div>

      <div class="form-group">
        <label for="inputMedthodOfExtractDNA" class="col-sm-2 control-label">Medthod Of Extracting DNA :</label>
        <div class="col-sm-8">
          <p>{{$labTask['dna_extraction_method']}}</p>
        </div>
      </div>

      <hr>

      <h4>&nbsp;&nbsp;Gene Of Analysis</h4>

      <hr>

      <div class="form-group">
        <label for="inputEndogenous" class="col-sm-2 control-label">Endogenous :</label>
        <div class="col-sm-8">
          <p>{{$labTask['endogenous']}}</p>
        </div>
      </div>

      <div class="form-group">
        <label for="inputTransgene" class="col-sm-2 control-label">Transgene :</label>
        <div class="col-sm-8">
          <p>{{$labTask['transgene']}}</p>
        </div>
      </div>


      <div class="row">

      </div>

<!-- <div class="form-group">
<label for="date1" class="col-sm-2 control-label ">Lab Status</label>
<div class="col-sm-2">

<select class="dateStart2 form-control">
<option>pending</option>
<option>passed</option>
</select>
</div>  
-->

<hr>
<div class="form-group">
  <div class="col-sm-offset-8 col-xs-4">
    <p>  <strong> ENDOSEE</strong> Yingpisit</p>
    <p>  <strong> DATE</strong>    13/06/2012</p>
  </div>
</div>
<hr>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-8">
    <button type="button" class="btn btn-muted btn-lg btn-block disabled">Start Analyzing Sequence</button>
  </div>
  <div class="col-sm-offset-2 col-sm-8">

 
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Lab Analyzing Sequence</th>
          <th>Experiment Document</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1. DNA Extraction</td>
          <td>
          @if($file1 == null)
          <strong id="status" class="text-warning">Pending</strong>
         {{ Form::open(array('action' => 'LabController@uploadLabResult', 'files' => true, 'id' => 'file1')) }}
                {{ Form::hidden('filenum', 'file1') }}
                <div width="50px">{{ Form::file('file1') }}</div>
                <button type="submit" class="btn btn-primary" onclick="form2()">submit</button>
          {{ Form::close() }}  
          @else
              <strong id="status" class="text-success">Uploaded(<a href='{{action('LabController@downloadLabResult',array('filename' => $file1))}}'>Download</a>)</strong>
          @endif
          </td>
        </tr> 
        <tr>
          <td>2. Volume & Concentration Measurement</td>
          <td> 
          @if(is_null($file2))
          <strong id="status" class="text-warning">Pending</strong>
         {{ Form::open(array('action' => 'LabController@uploadLabResult', 'files' => true, 'id' => 'file2')) }}
                {{ Form::hidden('filenum', 'file2') }}
                <div width="50px">{{ Form::file('file2') }}</div>
                <button type="submit" class="btn btn-primary" onclick="form2()">submit</button>
          {{ Form::close() }}  
          @else
              <strong id="status" class="text-success">Uploaded(<a href='{{action('LabController@downloadLabResult',array('filename' => $file2))}}'>Download</a>)</strong>
          @endif
          </td>
        </tr>
        <tr>
          <td>3. Endrogenous Gene Analysis</td>
          <td>
            @if($file3 == null)
              <strong id="status" class="text-warning">Pending</strong>
             {{ Form::open(array('action' => 'LabController@uploadLabResult', 'files' => true, 'id' => 'file3')) }}
                    {{ Form::hidden('filenum', 'file3') }}
                    <div width="50px">{{ Form::file('file3') }}</div>
                    <button type="submit" class="btn btn-primary" onclick="form2()">submit</button>
              {{ Form::close() }}  
              @else
                  <strong id="status" class="text-success">Uploaded(<a href='{{action('LabController@downloadLabResult',array('filename' => $file3))}}'>Download</a>)</strong>
              @endif
          </td>
        </tr>
        <tr>
          <td>4. Gene Analysis</td>
          <td>
              @if($file4 == null)
              <strong id="status" class="text-warning">Pending</strong>
             {{ Form::open(array('action' => 'LabController@uploadLabResult', 'files' => true, 'id' => 'file4')) }}
                    {{ Form::hidden('filenum', 'file4') }}
                    <div width="50px">{{ Form::file('file4') }}</div>
                    <button type="submit" class="btn btn-primary" onclick="form2()">submit</button>
              {{ Form::close() }}  
              @else
                  <strong id="status" class="text-success">Uploaded(<a href='{{action('LabController@downloadLabResult',array('filename' => $file4))}}'>Download</a>)</strong>
              @endif
          </td>
        </tr>

      </tbody>
    </table>

           

  </div>
</div>

<hr>
<strong><p class="text-normal text-center">(Lab Head only)</p></strong>
<div class="form-group">
  <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-success btn-lg btn-block disabled">Pass</button>
  </div>
  <div class="col-sm-offset-0 col-sm-5">
    <button type="button" class="btn btn-danger btn-lg btn-block disabled">Fail</button>
  </div> 

</div>


</div>
</div>



@endsection
