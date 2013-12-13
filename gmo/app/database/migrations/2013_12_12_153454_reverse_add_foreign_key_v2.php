<?php

use Illuminate\Database\Migrations\Migration;

class ReverseAddForeignKeyV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('export_certificates', function($table) {
			$table->foreign('export_certificate_request_id')->references('id')->on('export_certificate_requests');
		});

		Schema::table('export_certificate_requests', function($table) {
			$table->foreign('owner_id')->references('user_id')->on('entrepreneurs');
			$table->foreign('signer_id')->references('user_id')->on('entrepreneurs');
		});
		
		Schema::table('domestic_certificate_requests', function($table) {
			$table->foreign('owner_id')->references('user_id')->on('entrepreneurs');
			$table->foreign('signer_id')->references('user_id')->on('entrepreneurs');
		});

		Schema::table('export_certificate_request_forms', function($table) {
			$table->foreign('export_certificate_request_id','ecrf_ex_cert_req_id')->references('id')->on('export_certificate_requests');
		});

		Schema::table('domestic_certificate_request_forms', function($table) {
			$table->foreign('domestic_certificate_request_id','dcrf_do_cert_req_id')->references('id')->on('domestic_certificate_requests');
		});


		Schema::table('export_certificate_request_examples', function($table) {
			$table->foreign('export_certificate_request_form_id','ecte_ex_cert_req_form_id')->references('id')->on('export_certificate_request_forms');
		});


		Schema::table('domestic_certificate_request_examples', function($table) {
			$table->foreign('domestic_certificate_request_id','dcre_do_cert_req_id')->references('id')->on('export_certificate_requests');
		});


		Schema::table('export_certificate_request_info_forms', function($table) {
			$table->foreign('export_certificate_request_id','ecrif_ex_cert_req_id_ecr')->references('id')->on('export_certificate_requests');
		});


		Schema::table('lab_tasks', function($table) {
			$table->foreign('export_certificate_request_id','lab_task_ex_cert_req_id_ecr')->references('id')->on('export_certificate_requests');
		});

		Schema::table('lab_task_products', function($table) {
			$table->foreign('lab_task_id','ltp_lab_task_id_lt')->references('id')->on('lab_tasks');
		});

		Schema::table('lab_task_assignments', function($table) {
			$table->foreign('lab_task_id','lta_lab_task_id_lt')->references('id')->on('lab_tasks');
		});


		Schema::table('export_certificate_tests', function($table) {
			$table->foreign('export_certificate_id','ect_ex_cert_id_ec')->references('id')->on('export_certificates');
		});

		//-----------------------work------------------------------------

		//Schema::table('receipts', function($table) {
			//$table->foreign('request_reference_id','receipts_req_ref_id_ecr')->references('reference_id')->on('export_certificate_requests');

			//$table->foreign('request_reference_id','receipts_req_ref_id_dcr')->references('reference_id')->on('domestic_certificate_requests');
		//});


		Schema::table('upload_lab_task_files', function($table) {
			$table->foreign('labtask_id','ultf_labtask_id_ec')->references('id')->on('export_certificates');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('export_certificates', function($table) {
			$table->dropForeign('export_certificates_export_certificate_request_id_foreign');
		});

		Schema::table('export_certificate_requests', function($table) {
			$table->dropForeign('export_certificate_requests_owner_id_foreign');
			$table->dropForeign('export_certificate_requests_signer_id_foreign');
		});

		Schema::table('domestic_certificate_requests', function($table) {
			$table->dropForeign('domestic_certificate_requests_owner_id_foreign');
			$table->dropForeign('domestic_certificate_requests_signer_id_foreign');
		});

		Schema::table('export_certificate_request_forms', function($table) {
			$table->dropForeign('ecrf_ex_cert_req_id');
		});

		Schema::table('domestic_certificate_request_forms', function($table) {
			$table->dropForeign('dcrf_do_cert_req_id');
		});


		Schema::table('export_certificate_request_examples', function($table) {
			$table->dropForeign('ecte_ex_cert_req_form_id');
		});


		Schema::table('domestic_certificate_request_examples', function($table) {
			$table->dropForeign('dcre_do_cert_req_id');
		});

		Schema::table('export_certificate_request_info_forms', function($table) {
			$table->dropForeign('ecrif_ex_cert_req_id_ecr');
		});

		Schema::table('lab_tasks', function($table) {
			$table->dropForeign('lab_task_ex_cert_req_id_ecr');
		});

		Schema::table('lab_task_products', function($table) {
			$table->dropForeign('ltp_lab_task_id_lt');
		});

		Schema::table('lab_task_assignments', function($table) {
			$table->dropForeign('lta_lab_task_id_lt');
		});


		Schema::table('export_certificate_tests', function($table) {
			$table->dropForeign('ect_ex_cert_id_ec');
		});
		//-----------------------work------------------------------------



		//Schema::table('receipts', function($table) {
			//$table->dropForeign('receipts_req_ref_id_ecr');
			//$table->dropForeign('receipts_req_ref_id_dcr');
		//});


		Schema::table('upload_lab_task_files', function($table) {
			$table->dropForeign('ultf_labtask_id_ec');
		});
	}

}
