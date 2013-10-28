<?php

// hello :3

class EntrepreneurRequestsController extends AbstractEntrepreneurController {

	public function index() {
		$certReqs = CertificateRequest::with('owner', 'signer')->where('owner_id', '=', $this->entrepreneur->id)->get();
		return View::make('requests/index')
			->with(array(
				'entrepreneur' => $this->entrepreneur,
				'certReqs' => $certReqs
			));
	}

	public function newRequests() {
		return View::make('requests/create_certificate')
				   ->with('entrepreneur', $this->entrepreneur);
	}

	public function create() {

		$entrepreneur = $this->entrepreneur;

		$certReq = new CertificateRequest;
		$certReq->status = 'Available'; 
		$certReq->reference_id = RunningNumber::increment('default');
		/*if ($entrepreneur->is_agency == 1) {
		}
		else {

		}*/
		$certReq->owner_id = $entrepreneur->id;
		$certReq->signer_id = $entrepreneur->id;

		$certReqFormValidator = Validator::make(Input::all(), CertificateRequestForm::getValidationRules());

		$certReqForm = new CertificateRequestForm;

		if ($certReqFormValidator->fails()) {
			return Redirect::action('EntrepreneurRequestsController@newRequests')
				->withErrors($certReqFormValidator)
				->withInput();
		}

		$certReqForm->export_certificate_request_id = $certReq->id;
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

		$certReqForm->save();

		$certReqFormValidator = Validator::make(Input::all(), CertificateRequestInfoForm::getValidationRules());

		$certReqForm = new CertificateRequestInfoForm;

		if ($certReqFormValidator->fails()) {
			return Redirect::action('EntrepreneurRequestsController@newRequests')
				->withErrors($certReqFormValidator)
				->withInput();
		}

		$certReqForm->export_certificate_request_id = $certReq->id;
		$certReqForm->common_name = Input::get('common_name');
		$certReqForm->vendor_or_consignee = Input::get('vendor_or_consignee');
		$certReqForm->address1 = Input::get('address1');
		$certReqForm->address2 = Input::get('address2');
		$certReqForm->city = Input::get('city');		
		$certReqForm->province = Input::get('province');
		$certReqForm->country = Input::get('country');
		$certReqForm->zip = Input::get('zip');
		$certReqForm->description_of_product = Input::get('description_of_product');
		$certReqForm->final_destination = Input::get('final_destination');
		$certReqForm->port_of_entry = Input::get('port_of_entry');
		$certReqForm->status = 'Available';

		$certReqForm->save();

		$certReq->save();

		return Redirect::action('EntrepreneurRequestsController@index');
	}

	public function show($id) {
		$certificateRequest = CertificateRequest::find($id);
		$certificateRequestForm = CertificateRequestForm::where('export_certificate_request_id', '=', $id)->first(); 
		$certificateRequestInfoForm = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $id)->first(); 
		return View::make('requests/view_request_information')
			->with(array('certReq' => $certificateRequest,
						 'certReqForm' => $certificateRequestForm,
						 'certReqInfoForm' => $certificateRequestInfoForm,
						 'entrepreneur' => $this->entrepreneur));
	}

}
