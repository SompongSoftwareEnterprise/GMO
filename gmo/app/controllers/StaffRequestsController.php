<?php

class StaffRequestsController extends BaseController {

	protected $requireGMOStaff = true;

	public function index() {
		$request1_1 = CertificateRequest::all();
		$request1_2 = DomesticCertificateRequest::all();
		$tableData = $this->createRequestTableData($request1_1,$request1_2);
		return View::make('staff_requests/index')->with('tableData',$tableData);
	}

	public function show($id) {

		$data = $this->createRequestData($id);
		return View::make('staff_requests/view_request_information')
			->with('data', $data)
			->with('id', $id);
	}

	public function createReceipt($id){
		$idForm = CertificateRequest::find($id);
		$idForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $idForm->id)->get();
		print_r($idForm);
		if(count($idForm)>0){
			$checkForm = true;
		} 
		else {
			$checkForm = false;
		}

		$receipt = 
		Receipt::where('export_certificate_request_id', '=', $id)->first();
		if( !(count($receipt) > 0) ){
			$receipt = new Receipt;
			$receipt->export_certificate_request_id = $id;
			if($checkForm)
				$receipt->price = 100+150;
			else
				$receipt->price = 100;
			$receipt->save();
		}
		return View::Make('staff_requests/create_receipt')
			->with('checkForm', $checkForm);
	}

	public function newLabTask($id) {
		return View::make('staff_requests/create_lab_task')
			->with('id', $id);
	}

	public function createLabTask($id) {

		//Check Validator rules
		$validator = Validator::make(Input::all(), LabTask::getValidationRules());
		if ($validator->fails()) {
			return Redirect::action('StaffRequestsController@newLabTask')
				->withErrors($validator)
				->withInput();
		}


		//Save in database
		$labTask = new labTask;
		$labTask->reference_id = 'LT'.RunningNumber::increment('default');
		$labTask->export_certificate_request_id = $id;
		$labTask->status = 'Pending';
		$labTask->product_code = Input::get('product_code');
		$labTask->detail = Input::get('product_detail');
		$labTask->dna_extraction_method = Input::get('method_of_extractinf_DNA');
		$labTask->gene_separation_method = Input::get('gene', '');
		$labTask->gene_of_analysis = Input::get('endogenous');
		$labTask->transgene = Input::get('transgene', '');
		$labTask->save();

		$product = new LabTaskProduct;
		foreach (Input::all() as $k => $v) {	
			$prefix = 'product_codepj';
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$number = substr($k, strlen($prefix));
				$product->lab_task_id = $id;
				$product->product_code = Input::get('product_codepj' . $number);
				$product->product_name = Input::get('product_namepj' . $number);
				$product->measure = Input::get('measurepj' . $number);
				$product->volume = Input::get('volumepj' . $number);
				$product->start = Input::get('dateStartpj' . $number) . "-" . Input::get('monthStartpj' . $number) . "-" . Input::get('yearStartpj' . $number);
				$product->finish = Input::get('dateFinishpj' . $number) . "-" . Input::get('monthFinishpj' . $number) . "-" . Input::get('yearFinishpj' . $number);
				$product->save();
			}
		}
		

		$responsible = new LabTaskAssignment;
		foreach (Input::all() as $k => $v) {
			$prefix = 'responsiblerp';
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$number = substr($k, strlen($prefix));
				$responsible->lab_task_id = $id;
				$responsible->assignee = Input::get('responsiblerp' . $number);
				$responsible->save();
			}
		}
		
		return View::make('/staff_requests/update_lab_task');

	}

	public function newResult($id, $type) {

		print_r($id);

		$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();	
		$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();

		// analysis
		if ($type == 'analysis') {
			return View::make('staff_requests/create_analysis')
				->with(array('certReqInfoForm' => $certificateRequestInfoForm,
							 'certReqForm' => $certificateRequestForm
				));	
		}
		// certificate
		else if ($type == 'certificate') {
			return View::make('staff_requests/create_certificate')
				->with(array('certReqInfoForm' => $certificateRequestInfoForm,
							 'certReqForm' => $certificateRequestForm
				));	
		}	

	}

	private function createRequestData($id) {
		$data = array('Request ID' => '', 'Importer Name' => '', 'Requester'=> '',
			'Sent Date' => '', 'Status' => '', 'Invoice' => '', 'Receipt' => '');
		$request = CertificateRequest::where('reference_id', '=', $id)->first();
		if($request == null) $request =  DomesticCertificateRequest::where('reference_id', '=', $id)->first();
		$data['ID'] = $request['id'];
		$data['Reference ID'] = $request['reference_id'];

		$importer = User::find($request['owner_id']);
		$requester = User::find($request['signer_id']);

		$data['Importer Name'] = $importer['name'];
		$data['Requester'] = $requester['name'];
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

	private function createRequestTableData($request1_1, $request1_2) {
		$items = array();

		// get request 1-1 data
		foreach ($request1_1 as $request) {
			$user = User::find($request->signer_id);
			$requestInfoFrom = CertificateRequestInfoForm::where('export_certificate_request_id','=',$request->id)->first();
			$item = array(
				'ID' => $request->id,
				'Reference ID' => $request->reference_id,
				'Plant Name' => $requestInfoFrom ? $requestInfoFrom->common_name : '-',
				'Entrepreneur' => $user ? $user->name : '(missing)',
				'Current Process' => $request->status
			);
			array_push($items, $item);
		}


		// get request 1-2 data
		foreach ($request1_2 as $request) {
			$user = User::find($request->signer_id);
			$requestInfoFrom = DomesticCertificateRequestForm::where('domestic_certificate_request_id','=',$request->id)->first();
			$item = array(
				'ID' => $request->id,
				'Reference ID' => $request->reference_id,
				'Plant Name' => '-',
				'Entrepreneur' => $user ? $user->name : '(missing)',
				'Current Process' => $request->status
			);
			array_push($items, $item);
		}


		return $items;
	}
	
	public function createResult($id, $type) {

		$exportCertificate = new ExportCertificate;
		$exportCertificate->reference_id =  'NG' . RunningNumber::increment('default');
		$exportCertificate->export_certificate_request_id = $id;
		$exportCertificate->sample_name = Input::get('sample_name');
		$exportCertificate->conclusion = Input::get('conclusion');
		if ($type == 'analysis') {
			$exportCertificate->is_certificate = 0;
		}
		else {
			$exportCertificate->is_certificate = 1;
		}

		$exportCertificate->save();

		$certificateRequest = CertificateRequest::where('id', '=', $id)->first();
		$certificateRequest->status = 'Available';

		$certificateRequest->update();

		return Redirect::action('StaffRequestsController@index');
	}

}

?>
