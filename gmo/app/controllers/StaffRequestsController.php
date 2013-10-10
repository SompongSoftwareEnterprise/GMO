<?php

class StaffRequestsController extends BaseController {

	public function index() {
		$requests = CertificateRequest::all();
		$tableData = $this->createRequestTableData($requests);
		return View::make('staff_requests/index')->with('tableData',$tableData);
	}

	public function show($id) {
		$data = $this->createRequestData($id);
		return View::make('staff_requests/view_request_information')->with('data',$data);
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

	private function createRequestData($id) {
		$data = array('Request ID' => '', 'Importer Name' => '', 'Requester'=> '',
			'Sent Date' => '', 'Status' => '', 'Invoice' => '', 'Receipt' => '');
		$request = CertificateRequest::where('reference_id','=',$id)->first();
		$data['Request ID'] = $request['reference_id'];

		$importer = Entrepreneur::find($request['owner_id']);
		$requester = Entrepreneur::find($request['signer_id']);

		$data['Importer Name'] = $importer['first_name'];
		$data['Requester'] = $requester['first_name'];
		$data['Sent Date'] = $request['created_at'];
		$data['Status'] = $request['status'];
		$data['Invoice'] = 'Available';

		$receipt = Receipt::where('export_certificate_request_id','=',$request->id)->get();
		if(count($receipt) > 0) {
			$data['Receipt'] = 'Available';			
		}
		else {
			$data['Receipt'] = 'Pending';		
		}

		return $data;


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
