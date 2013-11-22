<?php

class DomesticCertificateRequestForm extends Eloquent {

	protected $table="domestic_certificate_request_forms";

	public static function getValidationRules() {
		$rules = array(
			
			'rep_of' => 'required',
			'company_th' => 'required',
			'address_th' => 'required',
			'address_th2' => 'required',
			'city_th' => 'required',
			'province_th' => 'required',
			'company_en' => 'required',
			'address_en' => 'required',
			'address_en2' => 'required',
			'city_en' => 'required',
			'province_en' => 'required',
			'zip' => 'required',
			'purpose' => 'required',
			'contact_name' => 'required',
			'contact_number' => 'required'
		);
		return $rules;
	}

	

}
	
