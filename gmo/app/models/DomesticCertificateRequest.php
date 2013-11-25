<?php

class DomesticCertificateRequest extends Eloquent {

	protected $table="domestic_certificate_requests";

	public function owner() {
		return $this->belongsTo('Entrepreneur', 'owner_id');
	}
	public function signer() {
		return $this->belongsTo('Entrepreneur', 'signer_id');
	}

}
