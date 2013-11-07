<?php

class LabTask extends Eloquent {

	public static function getValidationRules() {
        $rules = array(
        	'productCode' => 'required',
        	'productDetail' => 'Required',
	        'methodOfExtractinfDNA' => 'Required',
	        'endogenous' => 'required',
        );
        return $rules;
    }

    
}