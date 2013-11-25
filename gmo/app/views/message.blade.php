@extends('layout')

@section('title')
	GMO e-Government System :: Message from the System
@endsection

@section('content')
<div class="row">
	
	<div class="col-sm-offset-3 col-xs-6">

		<br><br><br>
		
		<div class="panel panel-default message-box">
			<div class="panel-heading">
				<h3 class="panel-title">{{ isset($title) ? $title : 'Message' }}</h3>
			</div>
			<div class="panel-body text-center">
				{{ isset($text) ? $text : 'I thought you forgot to put in some text...' }}
			</div>
			<div class="clearfix panel-footer">
				@if (isset($back) ? $back : true)
					<div class="pull-left">
						<a href="javascript://" onclick="history.back()" class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
					</div>
				@endif
				<div class="text-right">
					@if (isset($action))
						<a href="{{ action($action) }}" class="btn btn-primary message-primary-action">
							@if (isset($actionIcon))
								<i class="glyphicon glyphicon-{{$actionIcon}}"></i>
							@endif
							{{$actionText}}
						</a>
					@endif
				</div>
			</div>
		</div>
		
		<br><br><br>

	</div>

</div>

@if (isset($extraHtml))
	{{$extraHtml}}
@endif

@endsection
