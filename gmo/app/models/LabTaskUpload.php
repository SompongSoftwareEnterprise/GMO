<?php

class LabTaskProduct extends Eloquent {
	public $timestamps = false;

	public static function getValidationRules() {
        $rules = array(
        	'file' => 'required|mimes:pdf|max:40000'
        );
        return $rules;
    }

}