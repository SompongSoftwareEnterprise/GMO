<?php

class EntrepreneurDomesticRequestsController extends AbstractEntrepreneurController {

	public function index() {

	} 

	public function newRequests() {
		if($this->entrepreneur->is_agency == 1){
			$entrepreneur = $this->entrepreneur;
			$customerAgency = CustomerAgency::join('entrepreneurs as en', 'en.user_id', '=', 'customer_id')
											->where('agency_id', '=', $entrepreneur->user_id)->get();
			return View::make('dmt_requests/create_certificate')
				->with(array(
					'entrepreneur' => $this->entrepreneur,
					'customerAgency' => $customerAgency
					));
		}
		return View::make('dmt_requests/create_certificate')
					->with('entrepreneur', $this->entrepreneur);
	}
	
	public function create() {
	
	    $entrepreneur = $this->entrepreneur;
	
	    $certReq = new DomesticCertificateRequest;
	    // $certReq->status = 'Pending'; 
		$certReq->reference_id = RunningNumber::increment('default');
		
		if ($entrepreneur->is_agency == 1) {
			$certReq->owner_id = Input::get('owner_id');
		}
		else {
			$certReq->owner_id = $entrepreneur->user_id;
		}
		
        // $certReq->owner_id = $entrepreneur->id;
		$certReq->signer_id = $entrepreneur->user_id;
    

		$certReqFormValidator = Validator::make(Input::all(), DomesticCertificateRequestForm::getValidationRules());
		// $certReqExampleValidator = Validator::make(Input::all(), DomesticCertificateRequestExample::getValidationRules());
		
        $certReqForm = new DomesticCertificateRequestForm;

		if ($certReqFormValidator->fails() ) {
			return Redirect::action('EntrepreneurDomesticRequestsController@newRequests')
				->withErrors($certReqFormValidator)
				->withInput();
		} 

		// if ($certReqExampleValidator->fails()) {
		// 	return Redirect::action('EntrepreneurDomesticRequestsController@newRequests')
		// 		->withErrors($certReqExampleValidator)
		// 		->withInput();
		// }

        if ($entrepreneur->is_agency == 1) {
			$certReqForm->owner_id = Input::get('owner_id');
		}
		else {
			$certReqForm->owner_id = $entrepreneur->user_id;
		}
//        $certReqForm->rep_of = Input::get('rep_of');
        $certReqForm->company_th = Input::get('company_th');
        $certReqForm->address_th = Input::get('address_th');
        $certReqForm->address_th2 = Input::get('address_th2');
        $certReqForm->city_th = Input::get('city_th');
        $certReqForm->province_th = Input::get('province_th');
        $certReqForm->company_en = Input::get('company_en');
        $certReqForm->address_en = Input::get('address_en');
        $certReqForm->address_en2 = Input::get('address_en2');
        $certReqForm->city_en = Input::get('city_en');
        $certReqForm->province_en = Input::get('province_en');
        $certReqForm->zip = Input::get('zip');
        $certReqForm->purpose = Input::get('purpose');
        $certReqForm->contact_name = Input::get('contact_name');
        $certReqForm->contact_number = Input::get('contact_number');
		




		$certReqForm->status = 'Available';
        $certReq->save();
        
//        $certReqForm->domestic_certificate_request_id = $certReq->id;
        $certReqForm->domestic_certificate_request_id = $certReq->reference_id;
        
        // example 
		foreach (Input::all() as $k => $v) {
			$prefix = 'plant_name_th_';		
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$number = substr($k, strlen($prefix));
				
				$certExample = new DomesticCertificateRequestExample;
				
				$certExample->domestic_certificate_request_id = $certReq->reference_id;
				$certExample->plant_name_th = Input::get('plant_name_th_' . $number);
				$certExample->plant_name_eng = Input::get('plant_name_eng_' . $number);
				$certExample->plant_name_sci = Input::get('plant_name_sci_' . $number);
				$certExample->cert_amount = Input::get('cert_amount_' . $number);
				$certExample->export_to = Input::get('export_to_' . $number);
				$certExample->export_qty = Input::get('export_qty_' . $number);
				$certExample->export_val = Input::get('export_val_' . $number);
				$certExample->save();
			}
		}

		$certReqForm->save();

		StatusChecker::update($certReq->reference_id);

		return Redirect::action('EntrepreneurDomesticRequestsController@show', array($certReq->reference_id));
	}


	public function show($id) {
		$dmtCertificateRequest = DomesticCertificateRequest::where('reference_id', '=', $id)->first();
		$dmtCertificateRequest['status'] = StatusChecker::getStatus($dmtCertificateRequest['status'],"entrepreneur");
		$owner = Entrepreneur::where('user_id', '=', $dmtCertificateRequest->owner_id)->first();
		$signer = Entrepreneur::where('user_id', '=', $dmtCertificateRequest->signer_id)->first();
		$dmtCertificateRequestForm = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $id)->first(); 
		return View::make('dmt_requests/view_request_information')
			->with(array('dmtCertReq' => $dmtCertificateRequest,
						 'owner' => $owner,
						 'signer' => $signer,
						 'dmtCertReqForm' => $dmtCertificateRequestForm
		));
	}


}

?>
