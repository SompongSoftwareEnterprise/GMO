<?php
	
	class StatusChecker{
		public static function update($id) {

			$status = StatusChecker::check($id);

			$request = CertificateRequest::where('reference_id', '=', $id)->first();
			if($request == null) {
				$request =  DomesticCertificateRequest::where('reference_id', '=', $id)->first();
			}
			$request['status'] = $status;
			$request->save();

		}

		private static function check($id) {

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
			$labtask = LabTask::where('export_certificate_request_id' , '=', $id)->first();
			$labStatus = "";
			if($labtask) {
				$labStatus = $labtask['status'];
			}
			$result = ExportCertificate::where('export_certificate_request_id', $id)->first();
			if($result) {
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
					return "lab_in_progress";
				}
				else if($receipt) {
					return "no_lab";
				}
				else if($invoice) {
					return "payment_required";
				}
				else {
					return "new_request";
				}
			}



		}

		public static function getStatus($status, $role) {
			if($role == "entrepreneur" || $role == "agency") {
				if($status == "new_request" || $status == "no_lab" || $status == "lab_pass" || $status == "lab_fail") {
					return "Pending";
				}
				else if($status == "payment_required") {
					return "Payment Required";
				}
				else if($status == "lab_in_progress") {
					return "Lab In Progress";
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
				if($status == "new_request") {
					return "New Request";
				}
				else if($status == "payment_required") {
					return "Awaiting payment";
				}
				else if($status == "no_lab") {
					return "Lab Not Initiated";
				}
				else if($status == "lab_in_progress") {
					return "Lab In Progress";
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
	}

?>
