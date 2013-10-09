<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('export_certificate_requests', function($table) {
			$table->integer('owner_id')->unsigned();
			$table->integer('signer_id')->unsigned();
		});
		Schema::table('lab_task_assignments', function($table) {
			$table->renameColumn('lab_task', 'lab_task_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('export_certificate_requests', function($table) {
			$table->dropColumn('owner_id', 'signer_id');
		});
		Schema::table('lab_task_assignments', function($table) {
			$table->renameColumn('lab_task_id', 'lab_task');
		});
	}

}