<?php

class CertificateRequest extends Eloquent {

	protected $table="export_certificate_requests";

	public function owner() {
		return $this->belongsTo('Entrepreneur', 'owner_id');
	}
	public function signer() {
		return $this->belongsTo('Entrepreneur', 'signer_id');
	}

}
