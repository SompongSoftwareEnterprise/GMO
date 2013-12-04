<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV8 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domestic_certificate_request_forms', function($table) {
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
		Schema::table('domestic_certificate_request_forms', function($table){
		    $table->dropColumn('status');
		});
	}

}
?>
