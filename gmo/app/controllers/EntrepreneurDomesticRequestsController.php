<?php

class EntrepreneurDomesticRequestsController extends AbstractEntrepreneurController {

	public function index() {

	} 

	public function newRequests() {
		return View::make('dmt_requests/create_certificate')
					->with('entrepreneur', $this->entrepreneur);
	}

}

?>
