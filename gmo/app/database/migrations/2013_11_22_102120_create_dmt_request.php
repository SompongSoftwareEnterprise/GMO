<?php

use Illuminate\Database\Migrations\Migration;

class CreateDmtRequest extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('domestic_certificate_request', function($table) {
			$table->increments('id');
			$table->string('status');
			$table->string('reference_id')->unique();
			$table->integer('owner_id')->unsigned();
			$table->integer('signer_id')->unsigned();
			$table->timestamps();
		});

		Schema::create('domestic_certificate_request_forms', function($table) {
			$table->increments('id');
			$table->integer('domestic_certificate_request')->unsigned();
			$table->string('rep_of');
			$table->string('company_th');
			$table->string('address_th');
			$table->string('address_th2');
			$table->string('city_th');
			$table->string('province_th');
			$table->string('company_en');
			$table->string('address_en');
			$table->string('address_en2');
			$table->string('city_en');
			$table->string('province_en');
			$table->integer('zip');
			$table->string('purpose');
			$table->string('contact_name');
			$table->string('contact_number');
		});

		Schema::create('domestic_certificate_request_examples', function($table) {
			$table->increments('id');
			$table->integer('domestic_certificate_request')->unsigned();
			$table->string('plant_name_th');
			$table->string('plant_name_eng');
			$table->string('plant_name_sci');
			$table->string('cert_amount');
			$table->string('export_to');
			$table->string('export_qty');
			$table->string('export_val');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('domestic_certificate_request');
		Schema::drop('domestic_certificate_request_forms');
		Schema::drop('domestic_certificate_request_examples');
	}

}
?>
