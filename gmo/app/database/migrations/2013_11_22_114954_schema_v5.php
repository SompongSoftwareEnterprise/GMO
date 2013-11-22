<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV5 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('domestic_certificate_request', 'domestic_certificate_requests');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('domestic_certificate_requests');
	}

}
?>
