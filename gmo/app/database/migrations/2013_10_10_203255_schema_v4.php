<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV4 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receipts', function($table){
		    $table->dropColumn('name');
		});


		Schema::table('export_certificate_request_forms', function($table){
		    $table->string('status');
		});

		Schema::table('export_certificate_request_info_forms', function($table){
		    $table->string('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receipts', function($table){
		    $table->string('name');
		});


		Schema::table('export_certificate_request_forms', function($table){
		    $table->dropColumn('status');
		});

		Schema::table('export_certificate_request_info_forms', function($table){
		    $table->dropColumn('status');
		});
	}

}
?>