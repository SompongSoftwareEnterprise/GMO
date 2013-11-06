<?php

Form::macro('date', function($name) {

	$old_data = explode('-', Form::getValueAttribute($name));

	$y = null;
	$m = null;
	$d = null;

	if (count($old_data) == 3) {
		$y = $old_data[0] + 543;
		$m = $old_data[1] + 0;
		$d = $old_data[2] + 0;
	}
	
	return '
		<div class="col-xs-3">
			' . Form::input('number', $name . '__date', $d, array('min' => 1, 'max' => 31, 'placeholder' => 'Date', 'class' => 'form-control', 'id' => $name)) . '
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
			), $m, array('class' => 'form-control')) . '
		</div>
		<div class="col-xs-4">
			' . Form::input('number', $name . '__year', $y, array('min' => 2443, 'max' => 3000, 'placeholder' => 'Year', 'class' => 'form-control')) . '
		</div>';
	
});
