<?php

use Illuminate\Database\Migrations\Migration;

class SchemaV3 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_tasks', function($table) {
			$table->renameColumn('gene_of_analysis', 'endogenous');
			$table->dropColumn('product_code');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_tasks', function($table) {
			$table->renameColumn('endogenous', 'gene_of_analysis');
			$table->string('product_code');
		});
	}

}