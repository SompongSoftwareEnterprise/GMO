<?php

class StaffRequestsController extends BaseController {

	public function index() {
		return View::make('staff_requests/index');
	}

	public function show($id) {
		return View::make('staff_requests/view_request_information');
	}

	public function createReceipt(){
		return View::Make('staff_requests/create_receipt');
	}

	public function newLabTask($id) {
		return View::make('staff_requests/create_lab_task');
	}

	public function createLabTask($id) {

	}

	public function newResult($id) {

	}

	public function createResult($id) {

	}	
}
