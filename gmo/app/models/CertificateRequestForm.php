<?php

class CertificateRequestForm extends Eloquent {

	protected $table="export_certificate_request_forms";

	public static function getValidationRules() {
		$rules = array(
			'manufactory_name' => 'required',
			'manufactory_address1' => 'required',
			// 'manufactory_address2' => 'required',
			'manufactory_city' => 'required',
			'manufactory_province' => 'required',
			'manufactory_country' => 'required',
			'manufactory_zip' => 'required',
			'manufactory_phone' => 'required',
			'manufactory_fax' => 'required',
			'warehouse_name' => 'required',
			'warehouse_address1' => 'required',
			// 'warehouse_address2' => 'required',
			'warehouse_city' => 'required',
			'warehouse_province' => 'required',
			'warehouse_country' => 'required',
			'warehouse_zip' => 'required',
			// 'purposes' => 'required',
			'contact_name' => 'required',
			'contact_phone' => 'required',
			'contact_email' => 'required | email',
			'receiver_name' => 'required',
			'receiver_address1' => 'required',
			// 'receiver_address2' => 'required',
			'receiver_city' => 'required',
			'receiver_province' => 'required',
			'receiver_country' => 'required',
			'origin_of_plant' => 'required',
		);
		return $rules;
	}

}
	
