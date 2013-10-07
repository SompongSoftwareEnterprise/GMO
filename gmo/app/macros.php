<?php

Form::macro('date', function($name) {
	
	return '
		<div class="col-xs-3">
			' . Form::input('number', $name . '__date', null, array('min' => 1, 'max' => 31, 'placeholder' => 'Date', 'class' => 'form-control', 'id' => $name)) . '
		</div>
		<div class="col-xs-5">
			' . Form::select($name . '__month', array(
				'--' => '-- Month --',
				'1' => 'January',
				'2' => 'February',
				'3' => 'March',
				'4' => 'April',
				'5' => 'May',
				'6' => 'June',
				'7' => 'July',
				'8' => 'August',
				'9' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December',
			), null, array('class' => 'form-control')) . '
		</div>
		<div class="col-xs-4">
			' . Form::input('number', $name . '__year', null, array('min' => 2443, 'max' => 3000, 'placeholder' => 'Year', 'class' => 'form-control')) . '
		</div>';
	
});