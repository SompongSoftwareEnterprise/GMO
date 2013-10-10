<?php

class StaffRequestsController extends BaseController {

	public function index() {
		$requests = CertificateRequest::all();
		$tableData = $this->createRequestTableData($requests);
		return View::make('staff_requests/index')->with('tableData',$tableData);
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

	private function createRequestTableData($requests) {
		$items = array();
		foreach ($requests as $request) {
			$entrepreneur = Entrepreneur::find($request->owner_id);
			$requestInfoFrom = CertificateRequestInfoForm::where('export_certificate_request_id','=',$request->id)->first();
			$item = array('ID' => $request->reference_id,'Plant Name' => $requestInfoFrom->common_name,'Entrepreneur' => $entrepreneur->first_name,'Current Process' => $request->status);
			array_push($items, $item);
		}

		return $items;
	}

}
