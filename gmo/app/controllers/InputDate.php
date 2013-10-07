<?php

class InputDate {
	
	public static function parse($name) {
		return sprintf('%04s-%02s-%02s',
					   Input::get($name . '__year') - 543,
					   Input::get($name . '__month'),
					   Input::get($name . '__date'));
	}
	
}