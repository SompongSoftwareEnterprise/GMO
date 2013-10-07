<?php

class InputDate {
	
	public static function rules($name) {
		return array(
			$name . '__date' => 'required|integer',
			$name . '__month' => 'required|integer',
			$name . '__year' => 'required|integer',
		);
	}
	public static function parse($name) {
		return sprintf('%04s-%02s-%02s',
					   Input::get($name . '__year') - 543,
					   Input::get($name . '__month'),
					   Input::get($name . '__date'));
	}
	
}
