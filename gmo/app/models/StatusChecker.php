<?php
	
	public function update($id) {

		$status = check($id);

		$request = CertificateRequest::where('reference_id', '=', $id)->first();
		if($request == null) {
			$request =  DomesticCertificateRequest::where('reference_id', '=', $id)->first();
		}
		$request['status'] = $status;
		$request->save();

	}

	private function check($id) {

		$request = CertificateRequest::where('reference_id', '=', $id)->first();
		$from2 = null;
		if($request == null) {
			$request =  DomesticCertificateRequest::where('reference_id', '=', $id)->first();
			$from2 = DomesticCertificateRequestForm::where('domestic_certificate_request_id', '=', $request['reference_id'])->first();
		}
		else {
			$from2 = CertificateRequestInfoForm::where('export_certificate_request_id', '=', $request['reference_id'])->first();
		}
		$invoice = Invoice::where('request_reference_id', '=', $id)->first();
		$receipt = Receipt::where('request_reference_id', '=', $id)->first();
		$labtask = LabTask::where('reference_id' , '=', $id)->first();
		$labStatus = "";
		if($labtask) {
			$labStatus = $labtask['status'];
		}
		$certificate = null;
		$analysisReport = null;
		if($certificate || $analysisReport) {
			return "complete";
		}
		else {
			if($labStatus == "Pass") {
				if($from2) {
					return "lab_pass";
				}
				else {
					return "doc_needed";
				}
			}
			else if($labStatus == "Fail") {
				if($from2) {
					return "lab_fail";
				}
				else {
					return "doc_needed";
				}
			}
			else if($labStatus != "") {
				return "lan_in_progress";
			}
			else if($receipt) {
				return "no_lab";
			}
			else if($invoice) {
				return "payment_required";
			}
			else {
				return "new_payment";
			}
		}



	}

	public function ThaiPung($status, $role) {
		if($role == "entrepreneur" || $role == "agency") {
			if($status == "new_payment" || $status == "no_lab" || $status == "lab_pass" || $status == "lab_fail") {
				return "Pending";
			}
			else if($status == "payment_required") {
				return "payment required";
			}
			else if($status == "lan_in_progress") {
				return "Lan In Progress";
			}
			else if($status == "doc_needed") {
				return "Document Needed";
			}
			else if($status == "complete") {
				return "Available";
			}
			else {
				return "";
			}

		}
		else {
			if($status == "new_payment") {
				return "New Request";
			}
			else if($status == "payment_required") {
				return "Awaiting payment";
			}
			else if($status == "no_lab") {
				return "Lab Not Initiated";
			}
			else if($status == "lan_in_progress") {
				return "Lan In Progress";
			}
			else if($status == "lab_pass") {
				return "Lab PASS";
			}
			else if($status == "lab_fail") {
				return "Lab FAIL";
			}
			else if($status == "doc_needed") {
				return "Pending";
			}
			else if($status == "complete") {
				return "Complete";
			}
			else {
				return "";
			}

		}
	}

?>