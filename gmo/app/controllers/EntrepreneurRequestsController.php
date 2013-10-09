<?php

class EntrepreneurRequestsController extends BaseController {

	public function index() {
		$entrepreneur = Entrepreneur::all()->first();
		return View::make('requests/index')
				   ->with('entrepreneur', $entrepreneur);
	}

	public function newRequests() {
		$entrepreneur = Entrepreneur::all()->first();
		return View::make('requests/create_certificate')
				   ->with('entrepreneur', $entrepreneur);
	}

	public function create($form_id) {
		if ($form_id == 1) {
			return $this->index();
		}
		else {
			return $this->index();	
		}
	}

	public function show($id) {
		return View::make('requests/view_request_information');
	}

}
