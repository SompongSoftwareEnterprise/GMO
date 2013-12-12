<?php

class LabTask extends Eloquent {

	public static function getValidationRules() {
        $rules = array(
           	'product_detail' => 'Required',
	        'method_of_extractinf_DNA' => 'Required',
	        'endogenous' => 'required',
        );
        return $rules;
    }

    
}