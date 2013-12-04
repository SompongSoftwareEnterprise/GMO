<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table('customer_agency', function($table) {
			$table->foreign('customer_id')->references('user_id')->on('entrepreneurs');
			$table->foreign('agency_id')->references('user_id')->on('entrepreneurs');
		});

/*
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
			$table->foreign('export_certificate_request_id')->references('id')->on('export_certificate_requests');
		});
*/

		//Schema::table('domestic_certificate_request_forms', function($table) {
			//$table->foreign('domestic_certificate_request_id')->references('id')->on('domestic_certificate_requests');
		//});


		//Schema::table('export_certificate_request_examples', function($table) {
			//$table->foreign('export_certificate_request_form_id')->references('id')->on('export_certificate_request_forms');
		//});


		//Schema::table('domestic_certificate_request_examples', function($table) {
			//$table->foreign('domestic_certificate_request_id')->references('id')->on('export_certificate_requests');
		//});

		//Schema::table('export_certificate_request_info_forms', function($table) {
			//$table->foreign('export_certificate_request_id')->references('id')->on('export_certificate_requests');
		//});


		//Schema::table('receipts', function($table) {
			//$table->foreign('export_certificate_request_id')->references('id')->on('export_certificate_requests');
		//});


		//Schema::table('lab_tasks', function($table) {
			//$table->foreign('export_certificate_request_id')->references('id')->on('export_certificate_requests');
		//});


		//Schema::table('lab_task_products', function($table) {
			//$table->foreign('lab_task_id')->references('id')->on('lab_tasks');
		//});

		//Schema::table('lab_task_assignments', function($table) {
			//$table->foreign('lab_task_id')->references('id')->on('lab_tasks');
		//});


		//Schema::table('export_certificate_tests', function($table) {
			//$table->foreign('export_certificate_id')->references('id')->on('export_certificates');
		//});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer_agency', function($table) {
			$table->dropForeign('customer_agency_customer_id_foreign')->unsigned();
			$table->dropForeign('customer_agency_agency_id_foreign')->unsigned();
		});


		/*Schema::table('export_certificates', function($table) {
			$table->dropForeign('export_certificates_export_certificate_request_id_foreign')->unsigned();
		});


		Schema::table('export_certificate_requests', function($table) {
			$table->dropForeign('export_certificate_requests_owner_id_foreign')->unsigned();
			$table->dropForeign('export_certificate_requests_signer_id_foreign')->unsigned();
		});


		Schema::table('domestic_certificate_requests', function($table) {
			$table->dropForeign('domestic_certificate_requests_owner_id_foreign')->unsigned();
			$table->dropForeign('domestic_certificate_requests_signer_id_foreign')->unsigned();
		});

		Schema::table('export_certificate_request_forms', function($table) {
			$table->dropForeign('export_certificate_request_forms_export_certificate_request_id_foreign')->unsigned();
		});*/
	}

}
