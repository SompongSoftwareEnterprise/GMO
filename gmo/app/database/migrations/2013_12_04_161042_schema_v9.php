<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV9 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receipts', function($table)
		{
			$table->string('reference_id')->unique();
			$table->integer('total_price')->unsigned();
			$table->renameColumn('export_certificate_request_id', 'request_reference_id');
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
		    $table->dropColumn('reference_id');
			$table->dropColumn('total_price');
			$table->renameColumn('request_reference_id', 'export_certificate_request_id');
		});
	}

}
?>
