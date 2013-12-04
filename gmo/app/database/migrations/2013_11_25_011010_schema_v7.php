<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV7 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domestic_certificate_request_forms', function($table) {
		    $table->renameColumn('rep_of', 'owner_id');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domestic_certificate_request_forms', function($table) {
		    $table->renameColumn('owner_id', 'rep_of');
		});
	}

}
?>
