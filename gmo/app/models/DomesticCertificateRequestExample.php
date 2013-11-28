<?php

class DomesticCertificateRequestExample extends Eloquent {

	protected $table='domestic_certificate_request_examples';

	public static function getValidationRules() {
		$rules = array(
			
			'plant_name_th' => 'required',
			'plant_name_eng' => 'required',
			'plant_name_sci' => 'required',
			'cert_amount' => 'required',
			'export_to' => 'required',
			'export_to' => 'required',
				
		);
		return $rules;
	}

}
