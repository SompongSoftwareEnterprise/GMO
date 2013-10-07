<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entrepreneurs', function($table) {
			$table->string('province')->default('');
			$table->string('zip')->default('');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
		Schema::create('customer_agency', function($table) {
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->integer('agency_id')->unsigned();
			$table->timestamps();
		});
		Schema::create('export_certificate_requests', function($table) {
			$table->increments('id');
			$table->string('status');
			$table->string('reference_id')->unique();
			$table->timestamps();
		});
		Schema::create('export_certificate_request_forms', function($table) {
			$table->increments('id');
			$table->integer('export_certificate_request_id')->unsigned();
			$table->string('manufactory_name');
			$table->string('manufactory_address1');
			$table->string('manufactory_address2');
			$table->string('manufactory_city');
			$table->string('manufactory_province');
			$table->string('manufactory_country');
			$table->string('manufactory_zip');
			$table->string('manufactory_phone');
			$table->string('manufactory_fax');
			$table->string('warehouse_name');
			$table->string('warehouse_address1');
			$table->string('warehouse_address2');
			$table->string('warehouse_city');
			$table->string('warehouse_province');
			$table->string('warehouse_country');
			$table->string('warehouse_zip');
			$table->string('warehouse_phone');
			$table->string('warehouse_fax');
			$table->string('purposes');
			$table->string('contact_name');
			$table->string('contact_phone');
			$table->string('contact_email');
			$table->string('receiver_name');
			$table->string('receiver_address1');
			$table->string('receiver_address2');
			$table->string('receiver_city');
			$table->string('receiver_province');
			$table->string('receiver_country');
			$table->string('origin_of_plant');
			$table->timestamps();
		});
		Schema::create('export_certificate_request_examples', function($table) {
			$table->increments('id');
			$table->integer('export_certificate_request_form_id')->unsigned();
			$table->string('type_of_example');
			$table->integer('quantity');
			$table->text('detail');
			$table->timestamps();
		});
		Schema::create('export_certificate_request_info_forms', function($table) {
			$table->increments('id');
			$table->integer('export_certificate_request_id')->unsigned();
			$table->string('common_name');
			$table->string('vendor_or_consignee');
			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('province');
			$table->string('country');
			$table->string('zip');
			$table->text('description_of_product');
			$table->string('final_destination');
			$table->string('port_of_entry');
			$table->timestamps();
		});
		Schema::create('lab_tasks', function($table) {
			$table->increments('id');
			$table->string('reference_id')->unique();
			$table->integer('export_certificate_request_id')->unsigned();
			$table->string('status');
			$table->string('product_code');
			$table->string('detail');
			$table->string('dna_extraction_method');
			$table->string('gene_separation_method');
			$table->string('gene_of_analysis');
			$table->string('transgene');
			$table->timestamps();
		});
		Schema::create('lab_task_products', function($table) {
			$table->increments('id');
			$table->integer('lab_task_id')->unsigned();
			$table->string('product_code');
			$table->string('product_name');
			$table->integer('measure');
			$table->integer('volume');
			$table->date('start');
			$table->date('finish');
		});
		Schema::create('lab_task_assignments', function($table) {
			$table->increments('id');
			$table->integer('lab_task')->unsigned();
			$table->string('assignee');
		});
		Schema::create('export_certificates', function($table) {
			$table->increments('id');
			$table->string('reference_id')->unique();
			$table->integer('export_certificate_request_id')->unsigned();
			$table->string('sample_name');
			$table->string('conclusion');
			$table->boolean('is_certificate');
			$table->timestamps();
		});
		Schema::create('export_certificate_tests', function($table) {
			$table->increments('id');
			$table->integer('export_certificate_id')->unsigned();
			$table->string('type');
			$table->string('result');
			$table->timestamps();
		});
		Schema::create('yy_running_numbers', function($table) {
			$table->integer('year');
			$table->string('kind', 16);
			$table->integer('number');
			$table->primary(array('year', 'kind'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entrepreneurs', function($table) {
			$table->dropColumn('zip', 'province', 'created_at', 'updated_at');
		});
		Schema::drop('customer_agency');
		Schema::drop('export_certificate_requests');
		Schema::drop('export_certificate_request_forms');
		Schema::drop('export_certificate_request_examples');
		Schema::drop('export_certificate_request_info_forms');
		Schema::drop('lab_tasks');
		Schema::drop('lab_task_products');
		Schema::drop('lab_task_assignments');
		Schema::drop('export_certificates');
		Schema::drop('export_certificate_tests');
		Schema::drop('yy_running_numbers');
	}

}
