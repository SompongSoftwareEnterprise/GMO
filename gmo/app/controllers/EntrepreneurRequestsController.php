<?php

class EntrepreneurRequestsController extends AbstractEntrepreneurController {

	public function index() {
		if ($this->entrepreneur->is_agency == 1) {
			$certReqs = CertificateRequest::select('owner.first_name as owner_first_name', 'owner.last_name as owner_last_name', 'signer.first_name as signer_first_name', 'signer.last_name as signer_last_name', 'export_certificate_requests.*')
											->join('entrepreneurs as owner', 'owner_id', '=', 'owner.user_id')
											->join('entrepreneurs as signer', 'signer_id', '=', 'signer.user_id')
											->where('signer_id', '=', $this->entrepreneur->user_id)
											->get();
			return View::make('requests/index')
			->with(array(
				'entrepreneur' => $this->entrepreneur,
				'certReqs' => $certReqs
			));
		}
		else {
			$certReqs = CertificateRequest::select('owner.first_name as owner_first_name', 'owner.last_name as owner_last_name', 'signer.first_name as signer_first_name', 'signer.last_name as signer_last_name', 'export_certificate_requests.*')
											->join('entrepreneurs as owner', 'owner_id', '=', 'owner.user_id')
											->join('entrepreneurs as signer', 'signer_id', '=', 'signer.user_id')
											->where('owner_id', '=', $this->entrepreneur->user_id)
											->get();
			return View::make('requests/index')
			->with(array(
				'entrepreneur' => $this->entrepreneur,
				'certReqs' => $certReqs
			));
		}
	}

	public function search() {
		$searchBy = Input::get('search_by');
		$searchInput = Input::get('search_input');
		if($searchBy == 'request_id') {
			$certReqs = CertificateRequest::join('entrepreneurs', 'owner_id', '=', 'entrepreneurs.user_id')
											->where('signer_id', '=', $this->entrepreneur->user_id)
											->where('reference_id', 'like', '%'.$searchInput.'%')	
											->get();
			$signer = Entrepreneur::where('user_id', '=', $this->entrepreneur->user_id)->first();
			return View::make('requests/index')
				->with(array(
					'entrepreneur' => $this->entrepreneur,
					'certReqs' => $certReqs,
					'signer' => $signer
				));
		}

		else if($searchBy == 'importer_name'){
			$certReqs = CertificateRequest::join('entrepreneurs', 'owner_id', '=', 'entrepreneurs.user_id')
											->where('signer_id', '=', $this->entrepreneur->user_id)
											->where('entrepreneurs.first_name','like','%'.$searchInput.'%')
											->orWhere('entrepreneurs.last_name','like','%'.$searchInput.'%')
											->get();
			$signer = Entrepreneur::where('user_id', '=', $this->entrepreneur->user_id)->first();
			return View::make('requests/index')
				->with(array(
					'entrepreneur' => $this->entrepreneur,
					'certReqs' => $certReqs,
					'signer' => $signer
				));
		}										
		else {
			$certReqs = CertificateRequest::join('entrepreneurs', 'owner_id', '=', 'entrepreneurs.user_id')
											->where('signer_id', '=', $this->entrepreneur->user_id)
											->where('entrepreneurs.first_name','like','%'.$searchInput.'%')
											->orWhere('entrepreneurs.last_name','like','%'.$searchInput.'%')
											->get();
			$signer = Entrepreneur::where('user_id', '=', $this->entrepreneur->user_id)->first();
			return View::make('requests/index')
				->with(array(
					'entrepreneur' => $this->entrepreneur,
					'certReqs' => $certReqs,
					'signer' => $signer
				));
		}
	}

	public function newRequests() {
		if ($this->entrepreneur->is_agency == 1) {
			$entrepreneur = $this->entrepreneur;
			$customerAgency = CustomerAgency::where('agency_id', '=', $entrepreneur->user_id)->get();
			return View::make('requests/create_certificate')
					->with(array(
						'entrepreneur' => $this->entrepreneur,
						'customerAgency' => $customerAgency
					));
		}
		else {
			return View::make('requests/create_certificate')
					->with('entrepreneur', $this->entrepreneur);
		}
	}

	public function newRequestsInfo($id) {
		return View::make('requests/create_certificate_2')
			->with(array(
				'entrepreneur' => $this->entrepreneur,
				'id' => $id
			));
	}

	public function create() {

		$entrepreneur = $this->entrepreneur;

		$certReq = new CertificateRequest;
		$certReq->status = 'Available'; 
		$certReq->reference_id = RunningNumber::increment('default');
		
		if ($entrepreneur->is_agency == 1) {
			$certReq->owner_id = Input::get('owner_id');
		}
		else {
			$certReq->owner_id = $entrepreneur->user_id;
		}

		$certReq->signer_id = $entrepreneur->user_id;

		$certReqFormValidator = Validator::make(Input::all(), CertificateRequestForm::getValidationRules());

		$certReqForm = new CertificateRequestForm;

		if ($certReqFormValidator->fails()) {
			return Redirect::action('EntrepreneurRequestsController@newRequests')
				->withErrors($certReqFormValidator)
				->withInput();
		}

		$certReqForm->manufactory_name = Input::get('manufactory_name');
		$certReqForm->manufactory_address1 = Input::get('manufactory_address1');
		$certReqForm->manufactory_address2 = Input::get('manufactory_address2');
		$certReqForm->manufactory_city = Input::get('manufactory_city');
		$certReqForm->manufactory_province = Input::get('manufactory_province');
		$certReqForm->manufactory_country = Input::get('manufactory_country');
		$certReqForm->manufactory_zip = Input::get('manufactory_zip');
		$certReqForm->manufactory_phone = Input::get('manufactory_phone');
		$certReqForm->manufactory_fax = Input::get('manufactory_fax');

		$certReqForm->warehouse_name = Input::get('warehouse_name');
		$certReqForm->warehouse_address1 = Input::get('warehouse_address1');
		$certReqForm->warehouse_address2 = Input::get('warehouse_address2');
		$certReqForm->warehouse_city = Input::get('warehouse_city');
		$certReqForm->warehouse_province = Input::get('warehouse_province');
		$certReqForm->warehouse_country = Input::get('warehouse_country');
	 	$certReqForm->warehouse_zip = Input::get('warehouse_zip');
		$certReqForm->warehouse_phone = Input::get('warehouse_phone');
		$certReqForm->warehouse_fax = Input::get('warehouse_fax');

		$checkboxes = Input::get('purpose');
		$string = '';

		$i = 0;
		if (Input::get('purpose') != null) {
			foreach ($checkboxes as $checkbox) {
				if ($i == 0)
					$string = $checkbox;
				else
					$string = $string . '|' . $checkbox;
				$i++;
			}
		}

		if (Input::get('other_checkbox') != null) {
			if ($string == '')
				$string = Input::get('other');
			else
				$string = $string . '|' . Input::get('other');
		}

		$certReqForm->purposes = $string;

		$certReqForm->contact_name = Input::get('contact_name');
		$certReqForm->contact_phone = Input::get('contact_phone');
		$certReqForm->contact_email = Input::get('contact_email');

		$certReqForm->receiver_name = Input::get('receiver_name');
		$certReqForm->receiver_address1 = Input::get('receiver_address1');
		$certReqForm->receiver_address2 = Input::get('receiver_address2');
		$certReqForm->receiver_city = Input::get('receiver_city');
		$certReqForm->receiver_province = Input::get('receiver_province');
		$certReqForm->receiver_country = Input::get('receiver_country');

		$certReqForm->origin_of_plant = Input::get('origin_of_plant');

		$certReqForm->status = 'Available';



		$certReq->save();

		$certReqForm->export_certificate_request_id = $certReq->reference_id;

		// example 
		foreach (Input::all() as $k => $v) {
			$prefix = 'example_type_ex';		
			if (substr($k, 0, strlen($prefix)) == $prefix) {
				$number = substr($k, strlen($prefix));
				$certExample = new CertificateRequestExample;
				$certExample->export_certificate_request_form_id = $certReq->reference_id;
				$certExample->type_of_example = Input::get('example_type_ex' . $number);
				$certExample->quantity = Input::get('example_quantity_ex' . $number);
				$certExample->detail = Input::get('example_detail_ex' . $number);
				$certExample->save();
			}
		}

		$certReqForm->save();

		return Redirect::action('EntrepreneurRequestsController@show', array($certReq->reference_id));
	}

	public function createCertificateInfo($id) {

		$certReqFormValidator = Validator::make(Input::all(), CertificateRequestInfoForm::getValidationRules());

		$certReqInfoForm = new CertificateRequestInfoForm;

		if ($certReqFormValidator->fails()) {
			return Redirect::action('EntrepreneurRequestsController@newRequestsInfo', array($id))
				->withErrors($certReqFormValidator)
				->withInput();
		}

		$certReqInfoForm->export_certificate_request_id = $id;
		$certReqInfoForm->common_name = Input::get('common_name');
		$certReqInfoForm->vendor_or_consignee = Input::get('vendor_or_consignee');
		$certReqInfoForm->address1 = Input::get('address1');
		$certReqInfoForm->address2 = Input::get('address2');
		$certReqInfoForm->city = Input::get('city');		
		$certReqInfoForm->province = Input::get('province');
		$certReqInfoForm->country = Input::get('country');
		$certReqInfoForm->zip = Input::get('zip');
		$certReqInfoForm->description_of_product = Input::get('description_of_product');
		$certReqInfoForm->final_destination = Input::get('final_destination');
		$certReqInfoForm->port_of_entry = Input::get('port_of_entry');
		$certReqInfoForm->status = 'Available';

		$certReqInfoForm->save();

		return Redirect::action('EntrepreneurRequestsController@index');
	}

	public function show($id) {
		$certificateRequest = CertificateRequest::where('reference_id', '=', $id)->first();
		$owner = Entrepreneur::where('user_id', '=', $certificateRequest->owner_id)->first();
		$signer = Entrepreneur::where('user_id', '=', $certificateRequest->signer_id)->first();
		$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first(); 
		$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first(); 
		return View::make('requests/view_request_information')
			->with(array('certReq' => $certificateRequest,
						 'owner' => $owner,
						 'signer' => $signer,
						 'certReqForm' => $certificateRequestForm,
						 'certReqInfoForm' => $certificateRequestInfoForm,
						 'entrepreneur' => $this->entrepreneur));
	}

	public function askForCertificateRequestInfo() {

	}

}
