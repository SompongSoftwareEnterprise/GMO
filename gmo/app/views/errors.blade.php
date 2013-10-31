<div class="panel panel-danger error-box">
	<div class="panel-heading">
		<h3 class="panel-title">An Error Has Occured!</h3>
	</div>
	<div class="panel-body">
		<ul>
			@foreach($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
		</ul>
	</div>
</div>
