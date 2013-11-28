<?php

class CertificateRequestInfoForm extends Eloquent {

	protected $table='export_certificate_request_info_forms';

	public static function getValidationRules() {
		$rules = array(
			'common_name' => 'required',
			'vendor_or_consignee' => 'required',
			'address1' => 'required',
			// 'address2' => 'required',
			'city' => 'required',
			'province' => 'required',
			'country' => 'required',
			'zip' => 'required',
			'description_of_product' => 'required',
			'final_destination' => 'required',
			'port_of_entry' => 'required'
		);
		return $rules;
	}

}
