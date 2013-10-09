<?php

class StaffRequestsController extends BaseController {

	public function index() {
		return View::make('staff_requests/index');
	}

	public function show($id) {
		return View::make('staff_requests/view_request_information');
	}

	public function confirm($id) {

	}

}
