<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV6 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domestic_certificate_request_forms', function($table) {
		    $table->timestamps();
		    $table->renameColumn('domestic_certificate_request', 'domestic_certificate_request_id');
		});

		Schema::table('domestic_certificate_request_examples', function($table) {
			$table->timestamps();
		    $table->renameColumn('domestic_certificate_request', 'domestic_certificate_request_id');
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
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		    $table->renameColumn('domestic_certificate_request_id', 'domestic_certificate_request');
		});

		Schema::table('domestic_certificate_request_examples', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		    $table->renameColumn('domestic_certificate_request_id', 'domestic_certificate_request');
		});
	}

}
?>
