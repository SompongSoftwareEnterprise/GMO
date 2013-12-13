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

	public function view($form,$id) {
		if($form == '11') {
			$request = CertificateRequest::where('reference_id', '=', $id)->first();
			updateStatus($request);
			$user = User::find($request->signer_id);
			$form = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();
			$example = CertificateRequestExample::where('export_certificate_request_form_id', '=', $id)->get();
			$entrepreneur = Entrepreneur::where('user_id', '=', $user['id'])->first();
			return View::make('view-form-1-1-1')->with('entrepreneur',$entrepreneur)->with('ex_cert',$form)->with('example',$example)->with('ref_id',$id);
		}
		else if($form == '12') {
			$request = CertificateRequest::where('reference_id', '=', $id)->first();
			updateStatus($request);
			$user = User::find($request->signer_id);
			$form = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();
			$entrepreneur = Entrepreneur::where('user_id', '=', $user['id'])->first();
			return View::make('view-form-1-1-2')->with('entrepreneur',$entrepreneur)->with('ex_cert_info',$form)->with('ref_id',$id);

		}
		else if($form == '21') {
            $request = DomesticCertificateRequest::where('reference_id', '=', $id)->first();
            updateStatus($request);
            $user = User::find($request->signer_id);
            $form = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $id)->first();
            $example = DomesticCertificateRequestExample::where('domestic_certificate_request_id', '=', $id)->get();
			$entrepreneur = Entrepreneur::where('user_id', '=', $user['id'])->first();
			return View::make('view-form-1-2')->with('entrepreneur',$entrepreneur)->with('dmt_cert',$form)->with('example',$example)->with('ref_id',$id);
		}
	}

	public function createInvoice($id){

		$idForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->get();

		if(count($idForm)>0){
			$checkForm = true;
		} 
		else {
			$checkForm = false;
		}

		$invoice = Invoice::where('request_reference_id', '=', $id)->first();

		if( empty($invoice) ){

			$invoice = new Invoice;
			$invoice->request_reference_id = $id;
			$invoice->reference_id = 'IV' . RunningNumber::increment('invoice');

			$price = array(
				array('name' => 'สทช.1-1/1', 'price' => 100),
			);

			if ($checkForm) {
				$price[] = array('name' => 'สทช.1-1/2', 'price' => 150);
			}

			$totalPrice = 0;
			foreach ($price as $item) {
				$totalPrice += $item['price'];
			}

			$invoice->price = json_encode($price);
			$invoice->total_price = $totalPrice;
			$invoice->save();

		} else {
			// use true to convert to array and not object
			$price = json_decode($invoice->price, true);
		}
		StatusChecker::update($id);
		return View::Make('staff_requests/create_invoice')
			->with('invoice', $invoice)
			->with('price', $price);
		
	}

	public function createReceipt($id){

		$receipt = Receipt::where('request_reference_id', '=', $id)->first();
		$invoice = Invoice::where('request_reference_id', '=', $id)->first();

		if( empty($receipt) ){

			$receipt = new Receipt;
			$receipt->reference_id = 'RC' . RunningNumber::increment('receipt');
			$receipt->request_reference_id = $id;
			$receipt->save();
    
		}

		$price = json_decode($invoice->price, true);
        
        $signer_name = DB::table('export_certificate_requests')
            ->join('receipts', 'export_certificate_requests.reference_id', '=', 'receipts.request_reference_id')
            ->join('users', 'users.id', '=', 'export_certificate_requests.signer_id')
            ->where('receipts.request_reference_id', '=', $id)
            ->select('users.name','export_certificate_requests.updated_at')
            ->get();

        StatusChecker::update($id);
            
		return View::Make('staff_requests/create_receipt')
			->with('receipt', $receipt)
			->with('invoice', $invoice)
			->with('price', $price)
			->with('signer_name',$signer_name);

	}

	public function newLabTask($id) {
		$examples = CertificateRequestExample::where('export_certificate_request_form_id', '=', $id)->get();
		return View::make('staff_requests/create_lab_task')
			->with('id', $id)
			->with('examples', $examples);
	}

	public function createLabTask($id) {

		//Check Validator rules
		$validator = Validator::make(Input::all(), LabTask::getValidationRules());
		if ($validator->fails()) {
			return Redirect::action('StaffRequestsController@newLabTask', $id)
				->withErrors($validator)
				->withInput();
		}

		//Save in database
		$labTask = new labTask;
		$labTask->reference_id = 'LT'.RunningNumber::increment('default');
		$labTask->export_certificate_request_id = $id;
		$labTask->status = 'Pending';
		// $labTask->product_code = Input::get('product_code');
		$labTask->detail = Input::get('product_detail');
		$labTask->dna_extraction_method = Input::get('method_of_extractinf_DNA');

		$labTask->gene_separation_method = Input::get('method_of_seperate_gene', '');
		$labTask->endogenous = Input::get('endogenous');
		// $labTask->gene_of_analysis = Input::get('endogenous');
		$labTask->transgene = Input::get('transgene', '');
		$labTask->save();

		foreach (Input::all() as $k => $v) {	
			$prefix = 'product_codepj';
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$product = new LabTaskProduct;
				$number = substr($k, strlen($prefix));
				$product->lab_task_id = $labTask->id;
				$product->product_code = Input::get('product_codepj' . $number);
				$product->product_name = Input::get('product_namepj' . $number);
				$product->measure = Input::get('measurepj' . $number);
				$product->volume = Input::get('volumepj' . $number);
				$product->start = InputDate::parse('dateStartpj' . $number);
				$product->finish = InputDate::parse('dateFinishpj' . $number);
				$product->save();
			}
		}
		

		foreach (Input::all() as $k => $v) {
			$prefix = 'responsiblerp';
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$responsible = new LabTaskAssignment;
				$number = substr($k, strlen($prefix));
				$responsible->lab_task_id = $labTask->id;
				$responsible->assignee = Input::get('responsiblerp' . $number);
				$responsible->save();
			}
		}
		
		StatusChecker::update($id);
		return View::make('/staff_requests/update_lab_task');

	}

	public function newResult($id, $type) {

		print_r($id);
// 
// 		$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();	
// 		$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();
// 
// 		// analysis
// 		if ($type == 'analysis') {
// 			return View::make('staff_requests/create_analysis')
// 				->with(array('certReqInfoForm' => $certificateRequestInfoForm,
// 							 'certReqForm' => $certificateRequestForm
// 				));	
// 		}
// 		// certificate
// 		else if ($type == 'certificate') {
// 			return View::make('staff_requests/create_certificate')
// 				->with(array('certReqInfoForm' => $certificateRequestInfoForm,
// 							 'certReqForm' => $certificateRequestForm
// 				));	
// 		}	

		$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();
		if ($certificateRequestForm != null) {
			$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();	
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
		else {
			$dmtCertReqForm = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $id)->first();
			$dmtCertReqEx = DomesticCertificateRequestExample::where('domestic_certificate_request_id', '=', $id)->first();
			if ($type == 'analysis') {
				return View::make('staff_requests/create_analysis_dmt')
					->with(array('dmtCertReqForm' => $dmtCertReqForm,
								 'dmtCertReqEx' => $dmtCertReqEx
					));	
			}
			// certificate
			else if ($type == 'certificate') {
				return View::make('staff_requests/create_certificate_dmt')
					->with(array('dmtCertReqForm' => $dmtCertReqForm,
								 'dmtCertReqEx' => $dmtCertReqEx
					));	
			}
		}

	}

	private function createRequestData($id) {
		$data = array(
			'Request ID' => '',
			'Importer Name' => '',
			'Requester'=> '',
			'Sent Date' => '',
			'Status' => '',
			'Invoice' => '0',
			'Receipt' => '0',
			'Request From' => '1',
			'Info From' => '0',
			'Certificate' => '2');
		$request = CertificateRequest::where('reference_id', '=', $id)->first();
		$info = null;
		if($request == null) {
			$data['Request From'] = '2';
			$request =  DomesticCertificateRequest::where('reference_id', '=', $id)->first();
			$info = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $request['reference_id'])->first();
		}
		else {
			$info = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $request['reference_id'])->first();
		}
		if($info) {
			$data['Info From'] = '1';
		}
		$data['ID'] = $request['id'];
		$data['Reference ID'] = $request['reference_id'];

		$importer = User::find($request['owner_id']);
		$requester = User::find($request['signer_id']);

		$data['Importer Name'] = $importer['name'];
		$data['Requester'] = $requester['name'];
		$data['Sent Date'] = $request['created_at'];
		$data['Status'] = StatusChecker::getStatus($request['status'],"staff");

		$invoice = Invoice::where('request_reference_id', '=', $id)->first();

		if($invoice != null) {
			$data['Invoice'] = $invoice->id;
		}

		$receipt = Receipt::where('request_reference_id', '=', $id)->first();
		if($receipt != null) {
			$data['Receipt'] = $receipt['id'];
		}

		if ($request['status'] == 'complete') {
			$certificate = ExportCertificate::where('export_certificate_request_id', '=', $request['reference_id'])->first();
			if ($certificate['is_certificate'] == '1')
				$data['Certificate'] = '1';
			else
				$data['Certificate'] = '0';
		}

		return $data;

	}

	private function createRequestTableData($request1_1, $request1_2) {
		$items = array();

		// get request 1-1 data
		foreach ($request1_1 as $request) {
			$user = User::find($request->owner_id);
			$requestInfoFrom = CertificateRequestInfoForm::where('export_certificate_request_id','=',$request->reference_id)->first();
			$item = array(
				'ID' => $request->id,
				'Reference ID' => $request->reference_id,
				'Plant Name' => $requestInfoFrom ? $requestInfoFrom->common_name : '-',
				'Entrepreneur' => $user ? $user->name : '(missing)',
				'Current Process' => StatusChecker::getStatus($request->status, "staff")
			);
			array_push($items, $item);
		}


		// get request 1-2 data
		foreach ($request1_2 as $request) {
			$user = User::find($request->signer_id);
			$requestInfoFrom = DomesticCertificateRequestForm::where('domestic_certificate_request_id','=',$request->id)->first();
			$DomesticCertificateRequestExample = DomesticCertificateRequestExample::where('domestic_certificate_request_id' ,'=', $request->reference_id)->first();
			$item = array(
				'ID' => $request->id,
				'Reference ID' => $request->reference_id,
				'Plant Name' => $DomesticCertificateRequestExample['plant_name_eng'],
				'Entrepreneur' => $user ? $user->name : '(missing)',
				'Current Process' => StatusChecker::getStatus($request->status, "staff")
			);
			array_push($items, $item);
		}


		return $items;
	}

	private function updateStatus($request) {
		$request['status'] = StatusChecker::getStatus($request['status'],"entrepreneur");
	}
	
	public function createResult($id, $type) {

		$exportCertificate = new ExportCertificate;
		$exportCertificate->reference_id = 'NG' . RunningNumber::increment('default');
		$exportCertificate->export_certificate_request_id = $id;
		$exportCertificate->sample_name = Input::get('sample_name');
		$exportCertificate->conclusion = Input::get('conclusion');
		if ($type == 'analysis') {
			$exportCertificate->is_certificate = 0;
		}
		else {
			$exportCertificate->is_certificate = 1;
		}

		foreach (Input::all() as $k => $v) {
			$prefix = 'test_ex';		
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$number = substr($k, strlen($prefix));
				$exportCertificateTest = new ExportCertificateTest;
				$exportCertificateTest->export_certificate_id = $id;
				$exportCertificateTest->type = Input::get('test_ex' . $number);
				$exportCertificateTest->result = Input::get('result_ex' . $number);
				$exportCertificateTest->save();
			}
		}

		$exportCertificate->save();

		$certificateRequest = CertificateRequest::where('reference_id', '=', $id)->first();
		if ($certificateRequest != null) {
			$certificateRequest->update();
		}
		else {
			$domesticCertificateRequest = DomesticCertificateRequest::where('reference_id', '=', $id)->first();	
			$domesticCertificateRequest->update();
		}
		StatusChecker::update($id);
		return Redirect::action('StaffRequestsController@index');
	}

	public function viewResult($id) {
		$certificateRequest = CertificateRequest::where('reference_id', '=', $id)->first();
		if ($certificateRequest != null) {
			$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();
			$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();
			$exportCertificate = ExportCertificate::where('export_certificate_request_id', '=', $id)->first();
			$exportCertificateTest = ExportCertificateTest::where('export_certificate_id', '=', $id)->get();
			if ($exportCertificate['is_certificate'] == '1') {
				return View::Make('staff_requests/certificate')
							->with('certificateRequest', $certificateRequest)
							->with('certificateRequestForm', $certificateRequestForm)
							->with('certificateRequestInfoForm', $certificateRequestInfoForm)
							->with('exportCertificate', $exportCertificate)
							->with('exportCertificateTest', $exportCertificateTest)
							->with('type', 'export');
			}
			else {
				return View::Make('staff_requests/analysis')
							->with('certificateRequest', $certificateRequest)
							->with('certificateRequestForm', $certificateRequestForm)
							->with('certificateRequestInfoForm', $certificateRequestInfoForm)
							->with('exportCertificate', $exportCertificate)
							->with('exportCertificateTest', $exportCertificateTest)
							->with('type', 'export');
			}
		}
		else {
			$domesticCertificateRequest = DomesticCertificateRequest::where('reference_id', '=', $id)->first();
			$domesticCertificateRequestForm = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $id)->first();
			$domesticCertificateRequestExample = DomesticCertificateRequestExample::where('domestic_certificate_request_id', '=', $id)->first();
			$exportCertificate = ExportCertificate::where('export_certificate_request_id', '=', $id)->first();
			$exportCertificateTest = ExportCertificateTest::where('export_certificate_id', '=', $id)->get();
			if ($exportCertificate['is_certificate'] == '1') {
				return View::Make('staff_requests/certificate_dmt')
							->with('dmtCertRequest', $domesticCertificateRequest)
							->with('dmtCertRequestForm', $domesticCertificateRequestForm)
							->with('dmtCertRequestEx', $domesticCertificateRequestExample)
							->with('exportCertificate', $exportCertificate)
							->with('exportCertificateTest', $exportCertificateTest)
							->with('type', 'domestic');
			}
			else {
				return View::Make('staff_requests/analysis_dmt')
							->with('dmtCertRequest', $domesticCertificateRequest)
							->with('dmtCertRequestForm', $domesticCertificateRequestForm)
							->with('dmtCertRequestEx', $domesticCertificateRequestExample)
							->with('exportCertificate', $exportCertificate)
							->with('exportCertificateTest', $exportCertificateTest)
							->with('type', 'domestic');
			}
		}
		// if ($CertificateRequest != null) {
			// $certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first();
			// $certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first();
			// $exportCertificate = ExportCertificate::where('export_certificate_request_id');
			// return View::Make('staff_requests/certificate');
		// } 
		// else {
			// $domesticCertificateRequest = DomesticCertificateRequest::where('reference_id', '=', $id)->first();
			// $domesticCertificateRequestForm = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $id)->first();
			// $exportCertificate = ExportCertificate::where('export_certificate_request_id');
			// return View::Make('staff_requests/certificate');
		// }
	}

}

?>
